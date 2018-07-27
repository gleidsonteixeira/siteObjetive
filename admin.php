<?php 
include_once 'conexao.php';
session_start();
if (isset($_SESSION['login'])) {

    ?>
    <!DOCTYPE html>
    <html dir="ltr" lang="pt-BR">
    <head>

        <title>Wallet Family</title>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="expires" content="Tue, 01 Jan 2019 12:12:12 GMT">
        <meta http-equiv="cache-control" content="public" />
        <meta http-equiv="Pragma" content="public">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta name="description" content=""/>
        <meta name="keywords" content=""/>
        <meta name="author" content="Gleidson Teixeira, g.teixeira@objetiveti.com.br"/>
        <meta name="robots" content="index, follow">
        <meta name="language" content="pt-br" />

        <link rel="canonical" href="" />
        <link rel="shortlink" href="" />
        <link rel="stylesheet" href="css/font-awesome.css" type="text/css"/>
        <link rel="stylesheet" href="css/materialize.css" type="text/css"/>
        <link rel="stylesheet" href="css/admin.css" type="text/css"/>
        <link rel="icon" href="" sizes="32x32" />
        <link rel="icon" href="" sizes="192x192" />
        <link rel="apple-touch-icon-precomposed" href="" />

        <script src="js/jquery.js"></script>
        <script>
            (function(w,d,s,g,js,fs){
            g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
            js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
            js.src='https://apis.google.com/js/platform.js';
            fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
            }(window,document,'script'));
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        <!-- Include the ViewSelector2 component script. -->
        <script src="js_google/view-selector2.js"></script>
        <!-- Include the DateRangeSelector component script. -->
        <script src="js_google/date-range-selector.js"></script>
        <!-- Include the ActiveUsers component script. -->
        <script src="js_google/active-users.js"></script>
        <!-- Include the CSS that styles the charts. -->
        <link rel="stylesheet" href="js_google/chartjs-visualizations.css">        

    </head>

    <body>

        <div id="sidenav" class="active suave">
            <div class="logo">
                <img src="img/wallet-logo.png" alt="wallet-logo" >
            </div>
            <div class="perfil">
                <img src=<?php echo $_SESSION['ds_caminho_img'];  ?>>
                <h6 class="font white-text"><?php echo $_SESSION['ds_nome'];  ?><span><?php if($_SESSION['tipo_usuario_idtipo_usuario'] == 1){echo "Administrador";}else{echo "Atendente";}  ?></span></h6>
                <input type="hidden" name="idusuario" id="idusuario" value=<?php echo $_SESSION['idusuario'];  ?>>
                <a href="admin-perfil.php"><i class="mdi-content-create"></i></a>
            </div>
            <span class="font">Área Administrativa:</span>
            <ul class="nm">
                <?php 
                $arr1 = str_split($_SESSION['ds_acesso_menu']);

                if ($arr1[0] == 1) {

                    ?>
                    <li>
                        <a href="admin.php" class="font suave"><i class="mdi-action-dashboard"></i>Dashboard</a>
                    </li>
                    <?php 
                }

                if ($arr1[1] == 1) {
                    
                    ?>
                    <li>
                        <a href="admin-banners.php" class="font suave"><i class="mdi-action-view-carousel"></i>Banners</a>
                    </li>
                    <?php 
                }

                if ($arr1[2] == 1) {

                    ?>
                    <li>
                        <a href="admin-depoimentos.php" class="font suave"><i class="mdi-action-account-circle"></i>Depoimentos</a>
                    </li>
                    <?php 
                }

                if ($arr1[3] == 1) {

                    ?>
                    <li>
                        <a href="admin-tickets.php" class="font suave"><i class="mdi-social-group"></i> Tickets</a>
                    </li>
                    <?php 
                }

                if ($arr1[4] == 1) {

                    ?>
                    <li>
                        <a href="admin-chat.php" class="font suave"><i class="mdi-action-question-answer"></i> Chat</a>
                    </li>
                    <?php 
                }

                if ($arr1[5] == 1) {

                    ?>
                    <li>
                        <a href="admin-blog.php" class="font suave"><i class="mdi-editor-insert-comment"></i> Blog</a>
                    </li>
                    <?php 
                }

                if ($arr1[6] == 1) {

                    ?>
                    <li>
                        <a href="admin-categorias.php" class="font suave"><i class="mdi-action-view-list"></i> Categorias</a>
                    </li>
                    <?php 
                }

                if ($arr1[7] == 1) {

                    ?>
                    <li>
                        <a href="admin-faq.php" class="font suave"><i class="mdi-action-help"></i> FAQs</a>
                    </li>
                    <?php 
                }

                if ($arr1[8] == 1) {

                    ?>
                    <li>
                        <a href="admin-newsletter.php" class="font suave"><i class="mdi-communication-email"></i> Newsletter</a>
                    </li>
                    <?php 
                }

                if ($arr1[9] == 1) {

                    ?>
                    <li>
                        <a href="admin-info.php" class="font suave"><i class="mdi-action-info"></i> Informações</a>
                    </li>
                    <?php 
                }

                if ($arr1[10] == 1) {

                    ?>
                    <li>
                        <a href="admin-usuarios.php" class="font suave"><i class="mdi-social-person-add"></i> Usuários</a>
                    </li>
                    <?php 
                }

                ?>
                <li>
                    <a href="logout.php" class="font suave"><i class="mdi-action-lock-open"></i> Sair</a>
                </li>

            </ul>
        </div>

        <div id="content" class="active suave np">
            <i class="mdi-navigation-menu menu-btn suave click"></i>
            <h3 class="font suave"><span>Dashboard</span></h3>
            <div class="lista-infos">
                <ul class="nm">
                    <li class="item suave">
                        <h6 class="font">Banners</h6>
                        <?php 
                            $rs = $con->query("select count(idbanner) as quantBanner from banner;");
                            $row = $rs->fetch(PDO::FETCH_OBJ);
                        ?>
                        <span class="p condensed light"><?php echo $row->quantBanner; ?></span>
                    </li>
                    <li class="item suave">
                        <h6 class="font">Atendentes</h6>
                        <?php 
                            $rs = $con->query("select count(idusuario) as quantUsuario from usuario;");
                            $row = $rs->fetch(PDO::FETCH_OBJ);
                        ?>
                        <span class="p condensed light"><?php echo $row->quantUsuario; ?></span>
                    </li>
                    <li class="item suave">
                        <h6 class="font">Depoimentos</h6>
                        <?php 
                            $rs = $con->query("select count(iddepoimento) as quantDep from depoimento;");
                            $row = $rs->fetch(PDO::FETCH_OBJ);
                        ?>
                        <span class="p condensed light"><?php echo $row->quantDep; ?></span>
                    </li>
                    <li class="item suave">
                        <h6 class="font">Publicações no blog</h6>
                        <?php 
                            $rs = $con->query("select count(idpost_blog) as quantPostB from post_blog;");
                            $row = $rs->fetch(PDO::FETCH_OBJ);
                        ?>
                        <span class="p condensed light"><?php echo $row->quantPostB; ?></span>
                    </li>
                    <li class="item suave">
                        <h6 class="font">Faqs</h6>
                        <?php 
                            $rs = $con->query("select count(idfaqs) as quantFaqs from faqs;");
                            $row = $rs->fetch(PDO::FETCH_OBJ);
                        ?>
                        <span class="p condensed light"><?php echo $row->quantFaqs; ?></span>
                    </li>
                    <li class="item suave">
                        <h6 class="font">Lista de emails</h6>
                        <?php 
                            $rs = $con->query("select count(idnewsletter) as quantNS from newsletter;");
                            $row = $rs->fetch(PDO::FETCH_OBJ);
                        ?>
                        <span class="p condensed light"><?php echo $row->quantNS; ?></span>
                    </li>
                    <li class="item suave">
                        <h6 class="font light-blue">Tickets em Aberto</h6>
                        <span class="p status1 condensed light">0</span>
                    </li>
                    <li class="item suave">
                        <h6 class="font light-blue">Tickets aguardando atendente</h6>
                        <span class="p status2 condensed light">0</span>
                    </li>
                    <li class="item suave">
                        <h6 class="font light-blue">Tickets aguardando cliente</h6>
                        <span class="p status3 condensed light">0</span>
                    </li>
                    <li class="item suave">
                        <h6 class="font light-blue">Tickets encerrados</h6>
                        <span class="p status56 condensed light">0</span>
                    </li>
                    <li class="item suave" style="width: calc(100% - 20px); position: relative;">
                        <!-- <div id="embed-api-auth-container" style="padding: 20px; text-align: center;"></div>
                            <div id="chart-container" style="padding: 20px;"></div>
                        <div id="active-users-container">
                            <div class="ActiveUsers">
                                Active Users: <b class="ActiveUsers-value">0</b>
                            </div>
                        </div> -->
                        <!-- <div id="view-selector-container" style="overflow: hidden;">
                            <style type="text/css">
                                table{float: left;}
                                #active-users-container{position: absolute; top: 20px; right: 20px;}
                            </style>
                        </div> -->
                        <header>
                            <div id="embed-api-auth-container" style="padding: 20px 20px 0 20px; text-align: center;"></div>
                            <style type="text/css">
                                select{display: block !important;}
                                .ViewSelector2{
                                    overflow: hidden;
                                }
                                .ViewSelector2-item{
                                    width: calc(33.333% - 20px);
                                    margin: 10px;
                                    float: left;
                                }
                            </style>
                            <div id="view-selector-container" style="padding: 20px 10px;"></div>
                            <div id="view-name" style="padding: 0 20px 10px 20px;"></div>
                            <div id="active-users-container" style="display: none;"></div>
                        </header>
                        <div class="row" style="padding: 10px;">
                            <div class="col l6 m6 s12">
                                <div class="Chartjs">
                                    <h6 class="font">Esta semana vs Semana passada (por sessões)</h6>
                                    <figure class="Chartjs-figure" id="chart-1-container"></figure>
                                    <ol class="Chartjs-legend" id="legend-1-container"></ol>
                                </div>
                            </div>
                            <div class="col l6 m6 s12">
                                <div class="Chartjs">
                                    <h6 class="font">Este ano vs Ano passado (por usuários)</h6>
                                    <figure class="Chartjs-figure" id="chart-2-container"></figure>
                                    <ol class="Chartjs-legend" id="legend-2-container"></ol>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px;">
                            <div class="col l6 m6 s12">
                                <div class="Chartjs">
                                    <h6 class="font">Principais navegadores (por visualizações)</h6>
                                    <figure class="Chartjs-figure" id="chart-3-container"></figure>
                                    <ol class="Chartjs-legend" id="legend-3-container"></ol>
                                </div>
                            </div>
                            <div class="col l6 m6 s12">
                                <div class="Chartjs">
                                    <h6 class="font">Principais países (por sessões)</h6>
                                    <figure class="Chartjs-figure" id="chart-4-container"></figure>
                                    <ol class="Chartjs-legend" id="legend-4-container"></ol>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>


        
        <script src="js/materialize.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-storage.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-database.js"></script>
        <script src="js/tickets.js"></script>
        <script src="js/script.js"></script>
        <script>
            carregarAtendente();
            ticketAberto();
        </script>
        
        <script>
            gapi.analytics.ready(function() {
                /**
                 * Authorize the user immediately if the user has already granted access.
                 * If no access has been created, render an authorize button inside the
                 * element with the ID "embed-api-auth-container".
                 */
                gapi.analytics.auth.authorize({
                    container: 'embed-api-auth-container',
                    clientid: '563967840368-qk9vlj00klf5t5ffu2m8ddan6qsu187p.apps.googleusercontent.com'
                });
                /**
                 * Create a new ActiveUsers instance to be rendered inside of an
                 * element with the id "active-users-container" and poll for changes every
                 * five seconds.
                 */
                var activeUsers = new gapi.analytics.ext.ActiveUsers({
                    container: 'active-users-container',
                    pollingInterval: 5
                });

                /**
                 * Add CSS animation to visually show the when users come and go.
                 */
                activeUsers.once('success', function() {
                    var element = this.container.firstChild;
                    var timeout;

                    this.on('change', function(data) {
                    var element = this.container.firstChild;
                    var animationClass = data.delta > 0 ? 'is-increasing' : 'is-decreasing';
                    element.className += (' ' + animationClass);

                    clearTimeout(timeout);
                    timeout = setTimeout(function() {
                        element.className =
                            element.className.replace(/ is-(increasing|decreasing)/g, '');
                    }, 3000);
                    });
                });


                /**
                 * Create a new ViewSelector2 instance to be rendered inside of an
                 * element with the id "view-selector-container".
                 */
                var viewSelector = new gapi.analytics.ext.ViewSelector2({
                    container: 'view-selector-container',
                })
                .execute();


                /**
                 * Update the activeUsers component, the Chartjs charts, and the dashboard
                 * title whenever the user changes the view.
                 */
                viewSelector.on('viewChange', function(data) {
                    var title = document.getElementById('view-name');
                    title.textContent = data.property.name + ' (' + data.view.name + ')';

                    // Start tracking active users for this view.
                    activeUsers.set(data).execute();

                    // Render all the of charts for this view.
                    renderWeekOverWeekChart(data.ids);
                    renderYearOverYearChart(data.ids);
                    renderTopBrowsersChart(data.ids);
                    renderTopCountriesChart(data.ids);
                });


                /**
                 * Draw the a chart.js line chart with data from the specified view that
                 * overlays session data for the current week over session data for the
                 * previous week.
                 */
                function renderWeekOverWeekChart(ids) {

                    // Adjust `now` to experiment with different days, for testing only...
                    var now = moment(); // .subtract(3, 'day');

                    var thisWeek = query({
                    'ids': ids,
                    'dimensions': 'ga:date,ga:nthDay',
                    'metrics': 'ga:sessions',
                    'start-date': moment(now).subtract(1, 'day').day(0).format('YYYY-MM-DD'),
                    'end-date': moment(now).format('YYYY-MM-DD')
                    });

                    var lastWeek = query({
                    'ids': ids,
                    'dimensions': 'ga:date,ga:nthDay',
                    'metrics': 'ga:sessions',
                    'start-date': moment(now).subtract(1, 'day').day(0).subtract(1, 'week')
                        .format('YYYY-MM-DD'),
                    'end-date': moment(now).subtract(1, 'day').day(6).subtract(1, 'week')
                        .format('YYYY-MM-DD')
                    });

                    Promise.all([thisWeek, lastWeek]).then(function(results) {

                    var data1 = results[0].rows.map(function(row) { return +row[2]; });
                    var data2 = results[1].rows.map(function(row) { return +row[2]; });
                    var labels = results[1].rows.map(function(row) { return +row[0]; });

                    labels = labels.map(function(label) {
                        return moment(label, 'YYYYMMDD').format('ddd');
                    });

                    var data = {
                        labels : labels,
                        datasets : [
                        {
                            label: 'Last Week',
                            fillColor : 'rgba(220,220,220,0.5)',
                            strokeColor : 'rgba(220,220,220,1)',
                            pointColor : 'rgba(220,220,220,1)',
                            pointStrokeColor : '#fff',
                            data : data2
                        },
                        {
                            label: 'This Week',
                            fillColor : 'rgba(151,187,205,0.5)',
                            strokeColor : 'rgba(151,187,205,1)',
                            pointColor : 'rgba(151,187,205,1)',
                            pointStrokeColor : '#fff',
                            data : data1
                        }
                        ]
                    };
                    new Chart(makeCanvas('chart-1-container')).Line(data);
                    generateLegend('legend-1-container', data.datasets);
                    });
                }


                /**
                 * Draw the a chart.js bar chart with data from the specified view that
                 * overlays session data for the current year over session data for the
                 * previous year, grouped by month.
                 */
                function renderYearOverYearChart(ids) {

                    // Adjust `now` to experiment with different days, for testing only...
                    var now = moment(); // .subtract(3, 'day');

                    var thisYear = query({
                    'ids': ids,
                    'dimensions': 'ga:month,ga:nthMonth',
                    'metrics': 'ga:users',
                    'start-date': moment(now).date(1).month(0).format('YYYY-MM-DD'),
                    'end-date': moment(now).format('YYYY-MM-DD')
                    });

                    var lastYear = query({
                    'ids': ids,
                    'dimensions': 'ga:month,ga:nthMonth',
                    'metrics': 'ga:users',
                    'start-date': moment(now).subtract(1, 'year').date(1).month(0)
                        .format('YYYY-MM-DD'),
                    'end-date': moment(now).date(1).month(0).subtract(1, 'day')
                        .format('YYYY-MM-DD')
                    });

                    Promise.all([thisYear, lastYear]).then(function(results) {
                    var data1 = results[0].rows.map(function(row) { return +row[2]; });
                    var data2 = results[1].rows.map(function(row) { return +row[2]; });
                    var labels = ['Jan','Feb','Mar','Apr','May','Jun',
                                    'Jul','Aug','Sep','Oct','Nov','Dec'];

                    // Ensure the data arrays are at least as long as the labels array.
                    // Chart.js bar charts don't (yet) accept sparse datasets.
                    for (var i = 0, len = labels.length; i < len; i++) {
                        if (data1[i] === undefined) data1[i] = null;
                        if (data2[i] === undefined) data2[i] = null;
                    }

                    var data = {
                        labels : labels,
                        datasets : [
                        {
                            label: 'Last Year',
                            fillColor : 'rgba(220,220,220,0.5)',
                            strokeColor : 'rgba(220,220,220,1)',
                            data : data2
                        },
                        {
                            label: 'This Year',
                            fillColor : 'rgba(151,187,205,0.5)',
                            strokeColor : 'rgba(151,187,205,1)',
                            data : data1
                        }
                        ]
                    };

                    new Chart(makeCanvas('chart-2-container')).Bar(data);
                    generateLegend('legend-2-container', data.datasets);
                    })
                    .catch(function(err) {
                    console.error(err.stack);
                    });
                }


                /**
                * Draw the a chart.js doughnut chart with data from the specified view that
                * show the top 5 browsers over the past seven days.
                */
                function renderTopBrowsersChart(ids) {

                    query({
                    'ids': ids,
                    'dimensions': 'ga:browser',
                    'metrics': 'ga:pageviews',
                    'sort': '-ga:pageviews',
                    'max-results': 5
                    })
                    .then(function(response) {

                    var data = [];
                    var colors = ['#4D5360','#949FB1','#D4CCC5','#E2EAE9','#F7464A'];

                    response.rows.forEach(function(row, i) {
                        data.push({ value: +row[1], color: colors[i], label: row[0] });
                    });

                    new Chart(makeCanvas('chart-3-container')).Doughnut(data);
                    generateLegend('legend-3-container', data);
                    });
                }


                /**
                * Draw the a chart.js doughnut chart with data from the specified view that
                * compares sessions from mobile, desktop, and tablet over the past seven
                * days.
                */
                function renderTopCountriesChart(ids) {
                    query({
                    'ids': ids,
                    'dimensions': 'ga:country',
                    'metrics': 'ga:sessions',
                    'sort': '-ga:sessions',
                    'max-results': 5
                    })
                    .then(function(response) {

                    var data = [];
                    var colors = ['#4D5360','#949FB1','#D4CCC5','#E2EAE9','#F7464A'];

                    response.rows.forEach(function(row, i) {
                        data.push({
                        label: row[0],
                        value: +row[1],
                        color: colors[i]
                        });
                    });

                    new Chart(makeCanvas('chart-4-container')).Doughnut(data);
                    generateLegend('legend-4-container', data);
                    });
                }


                /**
                * Extend the Embed APIs `gapi.analytics.report.Data` component to
                * return a promise the is fulfilled with the value returned by the API.
                * @param {Object} params The request parameters.
                * @return {Promise} A promise.
                */
                function query(params) {
                    return new Promise(function(resolve, reject) {
                    var data = new gapi.analytics.report.Data({query: params});
                    data.once('success', function(response) { resolve(response); })
                        .once('error', function(response) { reject(response); })
                        .execute();
                    });
                }


                /**
                * Create a new canvas inside the specified element. Set it to be the width
                * and height of its container.
                * @param {string} id The id attribute of the element to host the canvas.
                * @return {RenderingContext} The 2D canvas context.
                */
                function makeCanvas(id) {
                    var container = document.getElementById(id);
                    var canvas = document.createElement('canvas');
                    var ctx = canvas.getContext('2d');

                    container.innerHTML = '';
                    canvas.width = container.offsetWidth;
                    canvas.height = container.offsetHeight;
                    container.appendChild(canvas);

                    return ctx;
                }


                /**
                * Create a visual legend inside the specified element based off of a
                * Chart.js dataset.
                * @param {string} id The id attribute of the element to host the legend.
                * @param {Array.<Object>} items A list of labels and colors for the legend.
                */
                function generateLegend(id, items) {
                    var legend = document.getElementById(id);
                    legend.innerHTML = items.map(function(item) {
                    var color = item.color || item.fillColor;
                    var label = item.label;
                    return '<li><i style="background:' + color + '"></i>' +
                        escapeHtml(label) + '</li>';
                    }).join('');
                }


                // Set some global Chart.js defaults.
                Chart.defaults.global.animationSteps = 60;
                Chart.defaults.global.animationEasing = 'easeInOutQuart';
                Chart.defaults.global.responsive = true;
                Chart.defaults.global.maintainAspectRatio = false;


                /**
                * Escapes a potentially unsafe HTML string.
                * @param {string} str An string that may contain HTML entities.
                * @return {string} The HTML-escaped string.
                */
                function escapeHtml(str) {
                    var div = document.createElement('div');
                    div.appendChild(document.createTextNode(str));
                    return div.innerHTML;
                }
            });
        </script>
    </body>
    </html>

    <?php 
}else{
    header('Location: index.php');
}
?>