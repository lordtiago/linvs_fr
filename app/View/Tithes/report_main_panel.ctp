<!-- Top Navbar-->
<div class="navbar">
  <!-- Navbar inner for Index page-->
  <div data-page="index" class="navbar-inner">
    <!-- We have home navbar without left link-->
    <div class="center sliding">Relatórios</div>
  </div>
  <!-- Navbar inner for About page-->
  <div data-page="about" class="navbar-inner cached">
    <div class="left sliding"><a href="#" class="back link"> <i class="icon icon-back"></i><span>Relatórios</span></a></div>
    <div class="center sliding">Relatório Simplificado</div>
  </div>
  <!-- Navbar inner for Services page-->
  <div data-page="services" class="navbar-inner cached">
    <div class="left sliding"><a href="#" class="back link"> <i class="icon icon-back"></i><span>Relatórios</span></a></div>
    <div class="center sliding">Sócios</div>
  </div>
  <div data-page="yearly" class="navbar-inner cached">
    <div class="left sliding"><a href="#" class="back link"> <i class="icon icon-back"></i><span>Relatórios</span></a></div>
    <div class="center sliding">Anual</div>
  </div>    
</div>

<!-- Pages, because we need fixed-through navbar and toolbar, it has additional appropriate classes-->
<div class="pages navbar-through toolbar-through">
  <!-- Index Page-->
  <div data-page="index" class="page">
    <!-- Scrollable page content-->
    <div class="page-content">
      <div class="content-block-title">Quais dos Relatórios deseja exibir?</div>
      <div class="list-block">
        <ul>
          <li><a href="#about" class="item-link">
              <div class="item-content">
                <div class="item-inner"> 
                  <div class="item-title">Relatório Simplificado</div>
                </div>
              </div></a></li>
          <li><a href="#services" class="item-link">
              <div class="item-content"> 
                <div class="item-inner">
                  <div class="item-title">Sócios</div>
                </div>
              </div></a></li>
          <li><a href="#yearly" class="item-link">
              <div class="item-content"> 
                <div class="item-inner">
                  <div class="item-title">Anual</div>
                </div>
              </div></a></li>            
        </ul>
      </div>
    </div>
  </div>
  <!-- About Page-->
  <div data-page="about" class="page cached">
    <div class="page-content">
        <?php echo $this->element("Tithes/report_simplify_form",array("report_simplify_year"=>$report_simplify_year));?>
    </div>
  </div>
  <!-- Services Page-->
  <div data-page="services" class="page cached">
    <div class="page-content">
        <?php echo $this->element("Tithes/report_tithing");?>
    </div>
  </div>
  <!-- Anual Page-->
  <div data-page="yearly" class="page cached">
    <div class="page-content">
        <?php echo $this->element("Tithes/report_yearly_form",array("report_simplify_year"=>$report_simplify_year));?>
    </div>
  </div>    
</div>