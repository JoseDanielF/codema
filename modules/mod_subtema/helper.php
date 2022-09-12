<?php
//No Direct Access
defined('_JEXEC') or die;

class modSubtemaHelper{
    public static function getList(&$params)
    {
        $app  = JFactory::getApplication();
        $menu = $app->getMenu();
        
        $base   = self::getBase($params);
        $user   = JFactory::getUser();
        $levels = $user->getAuthorisedViewLevels();
        asort($levels);
        $key   = 'menu_items' . $params . implode(',', $levels) . '.' . $base->id;
        $cache = JFactory::getCache('mod_bootstrapnav', '');
        if (!($items = $cache->get($key))) {
            $path    = $base->tree;
            $start   = 1;
            $end     = 0;
            $showAll = 1;
            $items   = $menu->getItems('menutype', $params->get('menutype'));
            
            $lastitem = 0;
            
            if ($items) {
                foreach ($items as $i => $item) {
                    if (($start && $start > $item->level) || ($end && $item->level > $end) || (!$showAll && $item->level > 1 && !in_array($item->parent_id, $path)) || ($start > 1 && !in_array($item->tree[$start - 2], $path))) {
                        unset($items[$i]);
                        continue;
                    }
                    
                    $item->deeper     = false;
                    $item->shallower  = false;
                    $item->level_diff = 0;
                    
                    if (isset($items[$lastitem])) {
                        $items[$lastitem]->deeper     = ($item->level > $items[$lastitem]->level);
                        $items[$lastitem]->shallower  = ($item->level < $items[$lastitem]->level);
                        $items[$lastitem]->level_diff = ($items[$lastitem]->level - $item->level);
                    }
                    
                    $item->parent = (boolean) $menu->getItems('parent_id', (int) $item->id, true);
                    
                    $lastitem     = $i;
                    $item->active = false;
                    $item->flink  = $item->link;
                    
                    switch ($item->type) {
                        case 'separator':
                        case 'heading':
                            // No further action needed.
                            break;
                        
                        case 'url':
                            if ((strpos($item->link, 'index.php?') === 0) && (strpos($item->link, 'Itemid=') === false)) {
                                // If this is an internal Joomla link, ensure the Itemid is set.
                                $item->flink = $item->link . '&Itemid=' . $item->id;
                            }
                            break;
                        
                        case 'alias':
                            $item->flink = 'index.php?Itemid=' . $item->params->get('aliasoptions');
                            break;
                        
                        default:
                            $item->flink = 'index.php?Itemid=' . $item->id;
                            break;
                    }
                    
                    $item->title        = htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8', false);
                    // $item->anchor_css   = htmlspecialchars($item->params->get('menu-anchor_css', ''), ENT_COMPAT, 'UTF-8', false);
                    // $item->anchor_title = htmlspecialchars($item->params->get('menu-anchor_title', ''), ENT_COMPAT, 'UTF-8', false);
                    $item->menu_image   = $item->getParams()->get('menu_image', '') ? htmlspecialchars($item->getParams()->get('menu_image', ''), ENT_COMPAT, 'UTF-8', false) : '';
                }
                
                if (isset($items[$lastitem])) {
                    $items[$lastitem]->deeper     = (($start ? $start : 1) > $items[$lastitem]->level);
                    $items[$lastitem]->shallower  = (($start ? $start : 1) < $items[$lastitem]->level);
                    $items[$lastitem]->level_diff = ($items[$lastitem]->level - ($start ? $start : 1));
                }
            }
            
            $cache->store($items, $key);
        }
        return $items;
    }

    public static function getBase(&$params)
    {
        if ($params->get('base')) {
            $base = JFactory::getApplication()->getMenu()->getItem($params->get('base'));
        } else {
            $base = false;
        }
        
        if (!$base) {
            $base = self::getActive($params);
        }
        
        return $base;
    }

    public static function getActive()
    {
        $menu = JFactory::getApplication()->getMenu();
        return $menu->getActive() ? $menu->getActive() : $menu->getDefault();
    }
}
?>