<?php 
include('adminNavbar.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            background-color: #F0FFF0;
            color: #fff;
            padding: 60px;
        }

        .sidebar {
            background-color: #2c2c2c;
        }


       
        .card {
            background-color: #343a40;
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            
            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
              <!--   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div> -->

                <!-- Total Customer Count Card -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Customers</h5>
                                <p class="card-text">500</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts -->
                <div class="row">
                    <div class="col-md-6">
                        <!-- Bar Chart - Sales Tracking -->
                        <canvas id="barChart"></canvas>
                    </div>
                    <div class="col-md-6">
                        <!-- Doughnut Chart - Order Summary -->
                        <canvas id="doughnutChart" width="150" height="150"></canvas>
                    </div>
                </div>

                <!-- Top Sales Section -->
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Top Sales</h5>
                                <ul>
                                    <li>Product A - $500</li>
                                    <li>Product B - $450</li>
                                    <li>Product C - $400</li>
                                    <!-- Add more items as needed -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Bar Chart - Sales Tracking
        var ctxBar = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'Sales',
                    data: [65, 59, 80, 81, 56, 55],
                    backgroundColor: '#3498db', // Blue color
                    borderColor: '#2980b9', // Darker blue color
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Doughnut Chart - Order Summary
        var ctxDoughnut = document.getElementById('doughnutChart').getContext('2d');
        var doughnutChart = new Chart(ctxDoughnut, {
            type: 'doughnut',
            data: {
                labels: ['Completed', 'In Progress', 'Pending'],
                datasets: [{
                    data: [30, 50, 20],
                    backgroundColor: ['#2ecc71', '#f39c12', '#e74c3c'], // Green, Orange, Red colors
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>

</body>

</html>
