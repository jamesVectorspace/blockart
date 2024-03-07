<div class="card">
    <div class="card-header">
        <h5 class="font-weight-600 c-gray-5">{{ __('Total New Users') }}</h5>
    </div>
    <div class="card-block h-360">
        @if (isset($newRegisterUsers['count']))
            <canvas id="chart-bar-1" class="w-100 h-300px"></canvas>
        @else
            <h6 class="text-secondary">{{ __('No data found.') }}</h6>
        @endif
    </div>
</div>
@if (isset($newRegisterUsers['count']))
<script type="text/javascript">
    $(document).ready(function() {
        var bar = document.getElementById("chart-bar-1").getContext('2d');
        var data = {
            labels: @json($newRegisterUsers['status'] ?? null),
            datasets: [{
                label: jsLang('Total New Registered Users'),
                data: @json($newRegisterUsers['count'] ?? 0),
                backgroundColor: [
                    "#fcca19",
                ],
                hoverBackgroundColor: [
                    "#fcca19",
                ]
            }]
        };
        var myPieChart = new Chart(bar, {
            type: 'bar',
            data: data,
            responsive: true,
            options: {
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endif
