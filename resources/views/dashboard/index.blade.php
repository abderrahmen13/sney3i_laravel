@extends('dashboard.layouts.app')
@section('main-content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
  <div class="container-fluid py-4">
    <div class="row">
     
   
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 my-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">clients</p>
                  <h5 class="font-weight-bolder mb-0">
                  {{$count['users']}} 
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 my-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Societés</p>
                  <h5 class="font-weight-bolder mb-0">
                  {{$count['company']}} 
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 my-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Profession</p>
                  <h5 class="font-weight-bolder mb-0">
                  {{$count['category']}} 
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 my-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Cateogries</p>
                  <h5 class="font-weight-bolder mb-0">
                  {{$count['sub_category']}} 
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
   @if(auth()->user()->role == 'admin')
    <div class="row pt-5">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Users Chart</h4>
                        <div id="first_chart" style="height: 300px;"></div>

                    </div>
                </div>
            </div>
           
            <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Profession Chart</h4>
                        <div id="second_chart" style="height: 300px;"></div>

                    </div>
                </div>
            </div>
          
        </div>
</div>
@endif

  </div>
</main>
    <!-- Charting library -->
    <script src="/js/echarts.min.js"></script>
    
    <!-- Chartisan -->
    <script src="/js/chartisan_echarts.js"></script>
    <!-- Your application script -->
    <script>
      
     

        const chart1 = new Chartisan({
            el: '#first_chart',
            url: "@chart('first_chart')",
            hooks: new ChartisanHooks()
                .legend()
                .colors()
                .tooltip()
                .axis(false)

                .datasets([{
                        type: 'bar',
                        radius: ['40%', '60%']
                    },

                ]),
        })
        const chart2 = new Chartisan({
            el: '#second_chart',
            url: "@chart('second_chart')",
            hooks: new ChartisanHooks()
                .legend()
                .colors()
                .tooltip()
                .axis(false)

                .datasets([{
                        type: 'bar',
                        radius: ['40%', '60%']
                    },

                ]),
        })



      
    </script>
@endsection