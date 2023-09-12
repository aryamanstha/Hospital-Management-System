<nav>
    <div class="sidebar-top">
      <span class="shrink-btn">
        <i class="bx bx-chevron-left"></i>
      </span>
      
      <h3 class="hide">One Health</h3>
      
    </div>

    <div class="search">
      <i class="bx bx-search"></i>
      <input type="text" class="hide" placeholder="Quick Search ..." />
    </div>

    <div class="sidebar-links">
      <ul class="main-navigation">
        <div class="active-tab"></div>
        <li class="tooltip-element" data-tooltip="0">
          <a href="{{route('admin.dashboard')}}" class="active" data-active="0">
            <div class="icon">
              <i class="bx bx-tachometer"></i>
              <i class="bx bxs-tachometer"></i>
            </div>
            <span class="link hide">Dashboard</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="1">
          <a href="{{route('admin.doctor.view')}}" data-active="1">
            <div class="icon">
              <i class="bx bx-folder"></i>
              <i class="bx bxs-folder"></i>
            </div>
            <span class="link hide">Doctors</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="1">
          <a href="#/" data-active="1">
            <div class="icon">
              <i class="bx bx-folder"></i>
              <i class="bx bxs-folder"></i>
            </div>
            <span class="link hide">Appointments</span>
          </a>
        </li>

        
        <div class="tooltip">
          <span class="show">Dashboard</span>
          <span>Projects</span>
          <span>Cards</span>
          <span>Blogs</span>
          <span>Forms</span>
        </div>
      </ul>

      <h4 class="hide">Shortcuts</h4>

      <ul>
        <li class="tooltip-element" data-tooltip="5">
          <a href="#/" data-active="5">
            <div class="icon">
              <i class="bx bx-notepad"></i>
              <i class="bx bxs-notepad"></i>
            </div>
            <span class="link hide">Tasks</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="6">
          <a href="#/" data-active="6">
            <div class="icon">
              <i class="bx bx-help-circle"></i>
              <i class="bx bxs-help-circle"></i>
            </div>
            <span class="link hide">Help</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="7">
          <a href="#/" data-active="7">
            <div class="icon">
              <i class="bx bx-cog"></i>
              <i class="bx bxs-cog"></i>
            </div>
            <span class="link hide">Settings</span>
          </a>
        </li>
        <div class="tooltip">
          <span class="show">Tasks</span>
          <span>Help</span>
          <span>Settings</span>
        </div>
      </ul>
    </div>

  </nav>