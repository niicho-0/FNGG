<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?><!DOCTYPE html>

<html lang="en" ng-app="app">
<head>
    <meta charset="utf-8">
    <title>AngularJS CRUD with Search, Sort and Pagination</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script> -->
	<script src="js/angular.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body ng-controller="memberdata" ng-init="fetch()">
	<!-- nav -->
    <?php include_once('header.php'); ?>
    <!-- END nav -->
<div class="container">
    <h1 class="page-header text-center">Overtime Report</h1>
    <div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="row">
				<div class="col-md-12">
					<span class="pull-right">
						<input type="text" ng-model="search" class="form-control" placeholder="Search">
					</span>
				</div>
			</div>
			<table class="table table-bordered table-striped" style="margin-top:10px;">
				<thead>
                    <tr>
                        <th ng-click="sort('emp_name')" class="text-center">Employee Name
                        	<span class="pull-right">
                       			<i class="fa fa-sort gray" ng-show="sortKey!='emp_name'"></i>
                       			<i class="fa fa-sort" ng-show="sortKey=='emp_name'" ng-class="{'fa fa-sort-asc':reverse,'fa fa-sort-desc':!reverse}"></i>
                       		</span>
                        </th>
                        <th ng-click="sort('timein')" class="text-center">Timein
	                        <span class="pull-right">
	                       		<i class="fa fa-sort gray" ng-show="sortKey!='timein'"></i>
	                       		<i class="fa fa-sort" ng-show="sortKey=='timein'" ng-class="{'fa fa-sort-asc':reverse,'fa fa-sort-desc':!reverse}"></i>
	                       	</span>
                        </th>
                        <th ng-click="sort('timeout')" class="text-center">Timeout
                        	<span class="pull-right">
                       			<i class="fa fa-sort gray" ng-show="sortKey!='timeout'"></i>
                       			<i class="fa fa-sort" ng-show="sortKey=='timeout'" ng-class="{'fa fa-sort-asc':reverse,'fa fa-sort-desc':!reverse}"></i>
                       		</span>
                       	</th>
						   <th ng-click="sort('total_min')" class="text-center">Hour(s)
                        	<span class="pull-right">
                       			<i class="fa fa-sort gray" ng-show="sortKey!='total_min'"></i>
                       			<i class="fa fa-sort" ng-show="sortKey=='total_min'" ng-class="{'fa fa-sort-asc':reverse,'fa fa-sort-desc':!reverse}"></i>
                       		</span>
                       	</th>
                       
                    </tr>
                </thead>
				<tbody>
					<tr dir-paginate="member in members|orderBy:sortKey:reverse|filter:search|itemsPerPage:10">
						<td>{{ member.emp_name }}</td>
						<td>{{ member.o_timein }}</td>
						<td>{{ member.o_timeout }}</td>
						<td>{{ member.o_total_min/60 }}</td>
						

					</tr>
				</tbody>
			</table>
			<div class="pull-right" style="margin-top:-30px;">
				<dir-pagination-controls
				   max-size="10"
				   direction-links="true"
				   boundary-links="true" >
				</dir-pagination-controls>
			</div>
		</div>
	</div>
	
</div>
<script src="js/dirPaginate.js"></script>
<script src="js/overtime-list-angular.js"></script>
</body>
</html>
<?php
} else {
  header("Location: index.php");
  exit();
}
?>