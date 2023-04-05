
        <div class="my-3 my-md-5">
          <div class="container">
            <div class="page-header">
              <h1 class="page-title">
                Welcome
              </h1>
            </div>
            <!-- <div class="row row-cards">
            <div class="col-sm-6 col-lg-3">
                <div class="card p-3">
                  <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-blue mr-3">
                      <i class="fe fe-dollar-sign"></i>
                    </span>
                    <div>
                      <h4 class="m-0"><a href="javascript:void(0)">132 <small>Sales</small></a></h4>
                      <small class="text-muted">12 waiting payments</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="card p-3">
                  <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-green mr-3">
                      <i class="fe fe-shopping-cart"></i>
                    </span>
                    <div>
                      <h4 class="m-0"><a href="javascript:void(0)">78 <small>Orders</small></a></h4>
                      <small class="text-muted">32 shipped</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="card p-3">
                  <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-red mr-3">
                      <i class="fe fe-users"></i>
                    </span>
                    <div>
                      <h4 class="m-0"><a href="javascript:void(0)">1,352 <small>Members</small></a></h4>
                      <small class="text-muted">163 registered today</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="card p-3">
                  <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-yellow mr-3">
                      <i class="fe fe-message-square"></i>
                    </span>
                    <div>
                      <h4 class="m-0"><a href="javascript:void(0)">132 <small>Comments</small></a></h4>
                      <small class="text-muted">16 waiting</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Development Activity</h3>
                  </div>
                  <div id="chart-development-activity" style="height: 10rem"></div>
                </div>
                <script>
                  require(['c3', 'jquery'], function(c3, $) {
                  	$(document).ready(function(){
                  		var chart = c3.generate({
                  			bindto: '#chart-development-activity', // id of chart wrapper
                  			data: {
                  				columns: [
                  				    // each columns data
                  					['data1', 0, 5, 1, 2, 7, 5, 6, 8, 24, 7, 12, 5, 6, 3, 2, 2, 6, 30, 10, 10, 15, 14, 47, 65, 55]
                  				],
                  				type: 'area', // default type of chart
                  				groups: [
                  					[ 'data1', 'data2', 'data3']
                  				],
                  				colors: {
                  					'data1': tabler.colors["blue"]
                  				},
                  				names: {
                  				    // name of each serie
                  					'data1': 'Purchases'
                  				}
                  			},
                  			axis: {
                  				y: {
                  					padding: {
                  						bottom: 0,
                  					},
                  					show: false,
                  						tick: {
                  						outer: false
                  					}
                  				},
                  				x: {
                  					padding: {
                  						left: 0,
                  						right: 0
                  					},
                  					show: false
                  				}
                  			},
                  			legend: {
                  				position: 'inset',
                  				padding: 0,
                  				inset: {
                                      anchor: 'top-left',
                  					x: 20,
                  					y: 8,
                  					step: 10
                  				}
                  			},
                  			tooltip: {
                  				format: {
                  					title: function (x) {
                  						return '';
                  					}
                  				}
                  			},
                  			padding: {
                  				bottom: 0,
                  				left: -1,
                  				right: -1
                  			},
                  			point: {
                  				show: false
                  			}
                  		});
                  	});
                  });
                </script>
              </div>
            </div> -->
          </div>
        </div>
      </div>