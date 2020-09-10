                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>
                                    <div>Analytics Dashboard
                                        
                                    </div>
                                </div>
                               </div>
                        </div>           
                         <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Total Orders</div>
                                            <div class="widget-subheading">Total Orders in All Restaurants</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>{{$total_orders}}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Sales</div>
                                            <div class="widget-subheading">Total Sales in All Restaurants</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>$ {{ $sales_sum}}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-grow-early">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Total Restaurants</div>
                                            <div class="widget-subheading">Total Restaurants Registered</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>{{$total_restaurants -1 }}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
            
                           
                        </div>
                        <div class="row">
                           
                            <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Income</div>
                                                <div class="widget-subheading">Expected totals</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-focus">$147</div>
                                            </div>
                                        </div>
                                        <div class="widget-progress-wrapper">
                                            <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;"></div>
                                            </div>
                                            <div class="progress-sub-label">
                                                <div class="sub-label-left">Expenses</div>
                                                <div class="sub-label-right">100%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Restaurants Pending Approvals
                                       
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Branch Name</th>
                                                <th class="text-center">Branch Phone Number</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($restaurants as $restaurant)
                                            <tr>
                                                <td class="text-center text-muted">#{{$restaurant->id}}</td>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading">{{$restaurant->branch_name}}</div>
                                                                <div class="widget-subheading opacity-7">{{$restaurant->brand_name}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                               
                                            
                                                <td class="text-center">{{$restaurant->branch_phone_number}}</td>
                                                <td class="text-center">
                                                    <div class="badge badge-warning">Pending</div>
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
                                                </td>
                                            </tr>
                                             @endforeach
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
           
                    </div>
                </div>