<?php
// No direct access
defined('_JEXEC') or die;

$document = JFactory::getDocument();
$modulePath = JURI::base() . 'modules/mod_calendario/';

//Adding JS Files
$document->addScript($modulePath . 'tmpl/js/angular.min.js');
$document->addScript($modulePath . 'tmpl/js/moment.min.js');
$document->addScript($modulePath . 'tmpl/js/index.js');

//Adding CSS Files
$document->addStyleSheet($modulePath . 'tmpl/css/style.css');

$model = JModelLegacy::getInstance('Articles', 'ContentModel', array('ignore_request' => true));
$appParams = JFactory::getApplication()->getParams();
$model->setState('params', $appParams);
$model->setState('filter.category_id', $params->get('menutype')); //change that to your Category ID
// $model->setState('list.ordering', 'title');
// $model->setState('list.direction', 'ASC');
$articlesCategory = (array) $model->getItems();
?>
<div class="col-md-6">
  <div class="row">
    <div class="col-md-12">
      <h5 class="fw-bold"> CALENDÁRIO DE REUNIÕES </h5>
    </div>
  </div>
  <div class="row">
    <div class="container-calendar" ng-app="myApp" ng-controller="AppCtrl">
      <div calendar class="calendar" id="calendar"></div>
    </div>
  </div>
</div>
<script>
  var app = angular.module('myApp', []);
  app.controller('AppCtrl', function($scope) {
    //alert("pepe")
  });
  app.directive('calendar', [function() {
    return {
      restrict: 'EA',
      scope: {
        date: '=',
        events: '='
      },
      link: function(scope, element, attributes) {
        var data = [];
        <?php foreach ($articlesCategory as $key => $value) : ?>
          data.push({
            date: new Date('<?php echo $value->created ?>'),
            events: [{
              name: '<?php echo $value->title ?>',
              type: 'bot',
              color: 'orange'
            }]
          });
        <?php endforeach; ?>
        var calendar = new Calendar('#calendar', data);
      }
    }
  }]);
</script>