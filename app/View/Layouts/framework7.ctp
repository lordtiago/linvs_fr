<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>My App</title>
    <?php echo $this->Html->css('framework7.min'); ?>
    <?php echo $this->Html->css('app'); ?>  
      
    <!-- Path to Framework7 Library JS-->
    <?php echo $this->Html->script('framework7.min'); ?>
    <?php echo $this->Html->script('jquery-1.10.2.min'); ?>      
  </head>
    <body>
        
        
        <!-- Panels overlay-->
        <div class="panel-overlay"></div> 
          
            <!-- Views-->
            <div class="views">
                <!-- Your main view, should have "view-main" class-->
                <div class="view view-main">
                    <?php echo $this->fetch('content'); ?>
                </div>
            </div>
        <!-- Path to your app js-->
        <?php echo $this->Html->script('app'); ?>
    </body>
</html>