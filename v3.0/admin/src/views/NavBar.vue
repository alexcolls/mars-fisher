<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo UADMIN_HOME_FILE ?>" style=""
      >Unknown</a
    >
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#mainNavBar"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavBar">
      <ul class="navbar-nav mr-auto">
        <li
          class="nav-item <?php echo $menu_item->id == $k_plugin->id ? 'active' : '' ?>"
        >
          <a href="?p=<?php echo $menu_item->id ?>" class="nav-link"> </a>
        </li>
        <li class="nav-item dropdown">
          <a
            href="#"
            class="nav-link dropdown-toggle"
            data-toggle="dropdown"
            role="button"
          >
            <span class="caret"></span>
          </a>
          <div class="dropdown-menu">
            <a
              href="?p=<?php echo $menu_item->id ?>"
              class="dropdown-item <?php echo $menu_item->id == $k_plugin->id ? 'active' : '' ?>"
            >
            </a>
          </div>
        </li>

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
      <ul class="navbar-nav mr-auto">
        <li
          class="nav-item <?php echo $menu_item->id == $k_plugin->id ? 'active' : '' ?>"
        >
          <a href="?p=<?php echo $menu_item->id ?>" class="nav-link"> </a>
        </li>
      </ul>

      <ul class="navbar-nav navbar-right">
        <li class="nav-item">
          <a class="nav-link">
            Hi
            <span style="font-style: italic" class=""> </span>
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
              Profile
            </a>

            <a href="?p=users" class="dropdown-item">
              <span class="fa fa-users"></span>
              Users
            </a>

            <a href="?p=jabber" class="dropdown-item">
              <span class="fa fa-comments"></span>
              Jabber Settings
            </a>

            <a href="?p=plugins" class="dropdown-item">
              <span class="fa fa-plug"></span>
              Plugins
            </a>

            <a href="?p=activities" class="dropdown-item">
              <span class="fa fa-stack-overflow"></span>
              Activities ?>
            </a>
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
</template>
