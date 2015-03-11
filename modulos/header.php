<?php
    $menu = $aaa->obtener_menu_usuario($_SESSION["codigo_sistema"], $_SESSION["id_usuario"]);
?>            
    <div class= "navbar">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div id="menu" style="height: auto;" class="nav-collapse navbar-responsive-collapse in collapse">
                    <ul class="nav">
                        <!-- LISTA GENERADA AUTOMÁTICAMENTE -->
                    </ul>
                    <ul class="nav pull-right">
                        <li id="fat-menu" class="dropdown">
                            <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
                                Cuenta <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                                <li><a href='index.php' role="menuitem" tabindex="-1">Inicio</a></li>
                                <li><a href='cambiar_pass.php' role="menuitem" tabindex="-1" target='contenido_central'>Cambiar Contrase&ntilde;a</a></li>
                                <li><a href='../login/cerrar_sesion.php' role="menuitem" tabindex="-1">Cerrar Sesi&oacute;n</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.nav-collapse -->
            </div>
        </div><!-- /navbar-inner -->
    </div><!-- /navbar -->
    <script>
        var data = <?=json_encode($menu)?>;
        var builddata = function () {
            var source = [];
            var items = [];
            // build hierarchical source.
            for (i = 0; i < data.length; i++) {
                var item = data[i];
                var label = item['texto'];
                var parentid = item['padre'];
                var id = item['id'];
                var url = item['url'];
                var activo = item['activo']

                if (activo == 0) {continue;}
                if (items[parentid]) {
                    var item = {parentid: parentid, label: label, item: item, url: item.url, mostrar: item.mostrar};
                    if (!items[parentid].items) {
                        items[parentid].items = [];
                    }
                    items[parentid].items[items[parentid].items.length] = item;
                    items[id] = item;
                } else {
                    items[id] = {parentid: parentid, label: label, item: item , url: item.url};
                    source[id] = items[id];
                }
            }
            return source;
        }
        var source = builddata();
        var buildUL = function (parent, items) {
            $.each(items, function () {
                if (this.label) {
                    // create LI element and append it to the parent element.
                    //console.log(this.url);
                    if (this.url != undefined ) { // el li elemento tiene url undefine se le agrega su respectivo URL
                        var li = $('\n\t\t<li class="mostrar"><a href="' + this.url + '" role="menuitem" tabindex="-1" target="contenido_central">' + this.label + '</a></li>');
                    } else {
                        if (this.parentid == '-1') {
                            var li = $('\n\t\t<li class="dropdown sha"><a href="#" class="dropdown-toggle" data-toggle="dropdown">' + this.label + '<b class="caret"></b></a></li>');
                        } else {
                            var li = $('\n\t\t<li class="dropdown-submenu sha   "><a href="#" class="dropdown-toggle" data-toggle="dropdown">' + this.label + '</a></li>');
                        }
                    }
                    li.appendTo(parent); 
                    // if there are sub items, call the buildUL function.
                    if (this.items && this.items.length > 0) {
                        var ul = $('\n\t<ul class="dropdown-menu"></ul>');
                        ul.appendTo(li);
                        buildUL(ul, this.items);
                    }
                }
            });
        }

        var ul = $('\n\t<ul class="nav navbar-nav"></ul>');
        ul.appendTo('#menu');
        buildUL(ul, source);
        $("li.sha li").not(".mostrar").remove()
    </script>
