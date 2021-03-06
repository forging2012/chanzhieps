<?php
/**
 * The browse view file of block module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv11.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class='icon-columns'></i> <?php echo $lang->block->browseRegion;?></strong>
    <?php foreach($templates as $template):?>
      <?php echo html::a(helper::createLink('block', 'pages', 'template=' . $template['code']), $template['name'], $currentTemplate == $template['code'] ? "class='active'" : "");?>
    <?php endforeach;?>
  </div>
  <table class='table table-bordered table-hover table-striped'>
    <tr>
      <th class='w-200px'><?php echo $lang->block->page;?></th>
      <th class='text-center'><?php echo $lang->block->regionList;?></th>
    </tr>
    <?php foreach($this->lang->block->$currentTemplate->pages as $page => $name):?>
    <?php if(empty($lang->block->$currentTemplate->regions->$page)) continue;?>
    <tr>
      <td><?php echo $name;?></td>
      <td>
      <?php
      $regions = $lang->block->$currentTemplate->regions->$page;
      foreach($regions as $region => $regionName)
      {
          echo html::a($this->inlink('setregion', "page={$page}&region={$region}&template={$currentTemplate}"), $regionName, "class='btn btn-xs' data-toggle='modal'");
      }
      ?>
      </td>
    </tr>
    <?php endforeach;?>
  </table>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
