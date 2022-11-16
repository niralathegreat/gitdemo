/*

CREATE TABLE `tbl_categories` (
  `id` int(10) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `item_alias` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `tbl_categories` (`id`, `item_name`, `parent_id`, `item_alias`, `created_at`) VALUES
(1, 'Electronics', 0, 'Electronicss', '2022-11-16 23:26:10'),
(2, 'Televisions', 1, 'Televisions', '2022-11-16 23:26:10'),
(3, 'Tube', 2, 'Tube', '2022-11-16 23:26:10'),
(4, 'LCD', 2, 'LCD', '2022-11-16 23:26:10'),
(5, 'Plasma', 2, 'Plasma', '2022-11-16 23:26:10'),
(6, 'Computers and Laptops', 1, 'Computers and Laptops', '2022-11-16 23:26:10'),
(7, 'Desktops', 6, 'Desktops', '2022-11-16 23:26:10'),
(8, 'Laptops', 6, 'Laptops', '2022-11-16 23:26:10'),
(9, 'Netbooks', 6, 'Netbooks', '2022-11-16 23:26:10'),
(10, 'Tablets', 6, 'Tablets', '2022-11-16 23:26:10'),
(11, 'Android', 10, 'Android', '2022-11-16 23:26:10'),
(12, 'iPad', 10, 'iPad', '2022-11-16 23:26:10'),
(13, 'Mobile Phones', 1, 'Mobile Phones', '2022-11-16 23:26:10'),
(14, 'Basic Cell Phones', 13, 'Basic Cell Phones', '2022-11-16 23:26:10'),
(15, 'Smartphones', 13, 'Smartphones', '2022-11-16 23:26:10'),
(16, 'Android Phones', 15, 'Android Phones', '2022-11-16 23:26:10'),
(17, 'iPhone', 15, 'iPhone', '2022-11-16 23:26:10');

ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tbl_categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

*/

<?php
$db = mysqli_connect('localhost', 'root', '', 'test');
$sql = 'select id, item_name as name, item_name as text, parent_id, item_alias, created_at from tbl_categories';
$result = mysqli_query($db, $sql);

$tree_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($tree_data as $k => &$v){
    $tmp_data[$v['id']] = &$v;
}

foreach($tree_data as $k => &$v){
    if($v['parent_id'] && isset($tmp_data[$v['parent_id']])){
        $tmp_data[$v['parent_id']]['nodes'][] = &$v;
    }
}

foreach($tree_data as $k => &$v){
    if($v['parent_id'] && isset($tmp_data[$v['parent_id']])){
        unset($tree_data[$k]);
    }
}

//echo json_encode($tree_data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>jQuery TreeTable Demo Page</title>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<!-- Bootstrap -->
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
body { background-color:#fafafa; font-family:'Open Sans';}
.container { margin:150px auto;}
    .treegrid-indent {
        width: 0px;
        height: 16px;
        display: inline-block;
        position: relative;
    }

    .treegrid-expander {
        width: 0px;
        height: 16px;
        display: inline-block;
        position: relative;
        left:-17px;
        cursor: pointer;
    }
</style>
</head>
<body>
<div id="jquery-script-menu">
<div class="jquery-script-center">
<ul>
<li><a href="http://www.jqueryscript.net/table/Minimal-Tree-Table-jQuery-Plugin-For-Bootstrap-TreeTable.html">Download This Plugin</a></li>
<li><a href="http://www.jqueryscript.net/">Back To jQueryScript.Net</a></li>
</ul>
<div class="jquery-script-ads"><script type="text/javascript"><!--
google_ad_client = "ca-pub-2783044520727903";
/* jQuery_demo */
google_ad_slot = "2780937993";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>
<div class="jquery-script-clear"></div>
</div>
</div>

<div class="container">
<h1 class="text-center">jQuery TreeTable Demo Page</h1>
  <table id="tree-table" class="table table-hover table-bordered">
    <tbody>
    <th>#</th>
      <th>Test</th>
    <tr data-id="1" data-parent="0" data-level="1">
      <td data-column="name">Node 1</td>
      <td>Additional info</td>
    </tr>
    <tr data-id="2" data-parent="1" data-level="2">
      <td data-column="name">Node 1</td>
      <td>Additional info</td>
    </tr>
    <tr data-id="3" data-parent="1" data-level="2">
      <td data-column="name">Node 1</td>
      <td>Additional info</td>
    </tr>
    <tr data-id="4" data-parent="3" data-level="3">
      <td data-column="name">Node 1</td>
      <td>Additional info</td>
    </tr>
    <tr data-id="5" data-parent="3" data-level="3">
      <td data-column="name">Node 1</td>
      <td>Additional info</td>
    </tr>
      </tbody>
    
  </table>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script src="js/javascript.js"></script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>


