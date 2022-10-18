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
<div class="modal fade" id="modalReuniao" tabindex="-1" aria-labelledby="modalReuniaoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalReuniaoLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
  var textos = [];

  function alterarTexto(event) {
    $('.modal .modal-header>h5')[0].innerHTML = textos[event.target.getAttribute('data-reuniao')].titulo;
    $('.modal .modal-body>div').html('');
    $('.modal .modal-body>div').append(textos[event.target.getAttribute('data-reuniao')].texto);
    var myModal = new bootstrap.Modal(document.getElementById("modalReuniao"), {});
    myModal.show();
  }

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
        var grupos = [];
        var data = [];
        <?php foreach ($articlesCategory as $key => $value) : ?>
          textos['<?php echo $value->id ?>'] = {
            texto: `<?php echo $value->introtext ?>`,
            titulo: `<?php echo $value->title ?>`
          };
          <?php $reuniao = $value->id ?>
          <?php $data = DateTimeImmutable::createFromFormat('Y-m-d H:i:s', Mity\ItemHelper::getFieldValue($value, 'data-da-reuniao'))->format('Y-m-d') ?>
          if ("<?php echo $data ?>" in grupos) {
            grupos["<?php echo $data ?>"].push({
              name: '<?php echo $value->title ?>',
              type: 'bot',
              color: 'orange',
              reuniao: '<?php echo $reuniao ?>'
            });
          } else {
            grupos["<?php echo $data ?>"] = [{
              name: '<?php echo $value->title ?>',
              type: 'bot',
              color: 'orange',
              reuniao: '<?php echo $reuniao ?>'
            }]
          }
        <?php endforeach; ?>
        data = [];
        for (const [key, value] of Object.entries(grupos)) {
          data.push({
            date: new Date(key),
            events: value
          });
        }
        var calendar = new Calendar('#calendar', data);
      }
    }
  }]);
</script>