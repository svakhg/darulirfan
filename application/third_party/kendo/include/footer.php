<?php
    $php = file_get_contents($_SERVER['SCRIPT_FILENAME']);
    $php = trim(preg_replace('/(<php\?)?.*require_once.*?(header|footer).*\r?\n?\r?\n?/', '', $php));
    $knownFiles = array(
        'DataSourceResult.php' => '../lib/DataSourceResult.php',
        'chart_data.php' => '../include/chart_data.php'
    )
?>
            </div>
            <div class="source">
                <a href="#" class="offline-button view selected">PHP</a>
<?php
    foreach ($knownFiles as $name => $path) {
        if(strpos($php, $name)) {
?>
                <a href="#" class="offline-button controller"><?= $name ?></a>
<?php
        }
    }
?>
                <div class="code">
                    <pre class="prettyprint view"><?= htmlentities($php) ?>
                    </pre>
<?php
    foreach ($knownFiles as $name => $path) {
        if(strpos($php, $name)) {
?>
                    <pre class="prettyprint controller"><?= htmlentities(file_get_contents($path)) ?>
                    </pre>
<?php
        }
    }
$timeTemplate = new \Kendo\UI\NotificationTemplate();
$timeTemplate->type('time');
$timeTemplate->template("<div style='padding: .6em 1em'>Time is: <span class='timeWrap'>#: time #</span></div>");

$notification = new \Kendo\UI\Notification('notification');
$notification->width("12em");
$notification->addTemplate($timeTemplate);
$notification->show("onShow");
$notification->hide("onHide");

echo $notification->render();

?>

<div class="demo-section">
    <p>
        <button id="showNotification" class="k-button">Show notification</button>

        <button id="hideAllNotifications" class="k-button">Hide All Notifications</button>
    </p>
</div>
                </div>
            </div>
        </div>
        <script>
       $(document).ready(function () {

        var notification = $("#notification").data("kendoNotification");

        $("#showNotification").click(function () {
            var d = new Date();
            notification.show({ time: kendo.toString(d, 'HH:MM:ss.') + kendo.toString(d.getMilliseconds(), "000") }, "time");
        });

        $("#hideAllNotifications").click(function () {
            notification.hide();
        });
    });
       </script>
        <script>
        $(function() {
            prettyPrint();

            $(".source a").click(function(e) {
                var showView = $(this).is(".view");

                $(".source .code")
                    .find(".view").toggle(showView).end()
                    .find(".controller").toggle(!showView);

                $(".source a").toggleClass("selected");

                e.preventDefault();
            });
        });
        </script>

    </body>
</html>
