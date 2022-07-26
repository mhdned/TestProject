<?php $this->include("panel.layouts.header",['name' => $name,'jobs' => $jobs]); ?>


<div id="myDIV" class="header">
  <h2 style="margin:5px">Hello <?php echo $name; ?></h2>
  <input type="text" id="myInput" placeholder="Title...">
  <span onclick="newElement()" class="addBtn">Add</span>
</div>

<ul id="myUL">
  <?php
  foreach($jobs as $job){
    if (!is_null($job['deleted'])) {
      continue;
    }else{
      echo '<li id='. $job['id'] .'';
      echo $job['checked'] ? ' class="checked" ': "" ;
      echo ">" . $job['content'] . "</li>";
    }
  ?>
  <?php
    }
  ?>
</ul>

<?php $this->include("panel.layouts.footer"); ?>
