<?php
if (!defined('UADMIN_AB_ROOT')) {die("You not have permisions");}
?>



<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <a class="navbar-brand" href="<?php echo UADMIN_HOME_FILE ?>" class="navbar-brand" style="">Unknown</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavBar"   >
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="mainNavBar">
  <?php if ($k_user->type == 0) {?>
    <ul class="navbar-nav mr-auto">
      <!-- <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li> -->

        <?php foreach ($plugins as $menu_item) {?>
            <?php if ($menu_item->type == "core") {continue;}?>
            <?php if ((in_array($menu_item->id, $k_user->perm_view) || $k_user->type == 0) && !property_exists($menu_item, 'group')) {?>
                <li class="nav-item <?php echo $menu_item->id == $k_plugin->id ? 'active' : '' ?>">
                    <a href="?p=<?php echo $menu_item->id ?>" class="nav-link">
                        <?php echo $menu_item->name; ?>
                    </a>
                </li>
            <?php };?>
        <?php };?>
        <?php foreach ($plugins_groups as $group_name => $group_plugins) {?>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button">
                        <?php echo $group_name; ?> 
                        <span class="caret"></span>
                </a>
                <div class="dropdown-menu">
                    <?php foreach ($group_plugins as $menu_item) {?>
                        <?php if ((in_array($menu_item->id, $k_user->perm_view) || $k_user->type == 0)) {?>
                           
                            <a href="?p=<?php echo $menu_item->id ?>" class="dropdown-item  <?php echo $menu_item->id == $k_plugin->id ? 'active' : '' ?>">
                                    <?php echo $menu_item->name; ?>
                            </a>
                            
                        <?php };?>
                    <?php };?>
                </div>
            </li>
        <?php };?>





      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->

    </ul>
   <?php } else {?>
    <ul class="navbar-nav mr-auto">
             <?php foreach ($plugins as $menu_item) {?>
                <?php if ($menu_item->type == "core") {continue;}?>
                <?php if (in_array($menu_item->id, $k_user->perm_view) || $k_user->type == 0) {?>
                <li class=" nav-item <?php echo $menu_item->id == $k_plugin->id ? 'active' : '' ?>">
                    <a href="?p=<?php echo $menu_item->id ?>" class="nav-link">
                        <?php echo $menu_item->name; ?>
                    </a>
                </li>
                <?php }; // if(in_array($menu_item->id, $k_user->perm_view) || $k_user->type == 0 ) ?>

            <?php }; //for each?>
      </ul>

    <?php };?>
     <ul class=" navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link">
                        <?php echo __('Hi') ?>!
                        <span style="font-style:italic" class="">
                            <?php echo $k_user->name; ?>
                        </span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle nav-link">
                        <span class="fa fa-gear"></span>
                        <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        
                            <a href="?p=profile" class="dropdown-item">
                                <span class="fa fa-user"></span>
                                <?php echo __('Profile') ?>
                            </a>
                        
                        <?php if ($k_user->type == 0) {?>
                        
                            <a href="?p=users" class="dropdown-item">
                                <span class="fa fa-users"></span>
                                <?php echo __('Users') ?>
                            </a>
                        
                        
                            <a href="?p=jabber" class="dropdown-item">
                                <span class="fa fa-comments"></span>
                                <?php echo __('Jabber Settings') ?>
                            </a>
                        
                        
                            <a href="?p=plugins" class="dropdown-item">
                                <span class="fa fa-plug"></span>
                                <?php echo __('Plugins') ?>
                            </a>


                            <a href="?p=activities" class="dropdown-item">
                                <span class="fa fa-stack-overflow"></span>
                                <?php echo __('Activities') ?>
                            </a>
                        
                        <?php }?>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="<?php echo UADMIN_HOME_FILE ?>?logout" class="nav-link">
                        <span class="fa fa-sign-out"></span>
                    </a>
                </li>
        </ul>
  </div>
</nav>



