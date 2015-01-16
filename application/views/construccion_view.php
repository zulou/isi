<div class="container-fluid">
    <div class="main-container">



       <div class="page-header">
            <div class="pull-left">
              <h2>Tablas Dinamicas</h2>
            </div>
            <div class="pull-right">
              <ul class="stats">
                <li class="color-first hidden-phone">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe0b3;"></span>
                  <div class="details">
                    <span class="big">12</span>
                    <span>New Tasks</span>
                  </div>
                </li>
                <li class="color-second">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe052;"></span>
                  <div class="details" id="date-time">
                    <span>Date </span>
                    <span>Day, Time</span>
                  </div>
                </li>
              </ul>
            </div>
            <div class="clearfix"></div>
          </div>

        <div class="row-fluid">
            <div class='span12'>
                <div class='widget no-margin'>
                    <div class='widget-header'>
                        <div class='title'>
                            <span class='fs1' data-icon='' aria-hidden='true'></span>
                            tabla Dinamica
                        </div>
                    </div>
                    <div class='widget-body'>
                        <div id='dt_example' class='example_alt_pagination'>
                            <div id='data-table_wrapper' class='dataTables_wrapper' role='grid'>
                                <div id='data-table_length' class='dataTables_length'></div>
                                <div id='data-table_filter' class='dataTables_filter'></div>
                                <table id="data-table" class="table table-condensed table-striped table-hover table-bordered pull-left dataTable" aria-describedby="data-table_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" style="width: 248px;" role="columnheader" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Buyers Name: activate to sort column descending">Buyers Name</th>
                                            <th class="sorting" style="width: 446px;" role="columnheader" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">Address</th>
                                            <th class="hidden-phone sorting" style="width: 182px;" role="columnheader" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Contact: activate to sort column ascending">Contact</th>
                                            <th class="hidden-phone sorting" style="width: 182px;" role="columnheader" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Due Amount: activate to sort column ascending">Due Amount</th>
                                            <th class="hidden-phone sorting" style="width: 182px;" role="columnheader" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                                        <tr class="gradeC odd">
                                            <td class=" sorting_1">Arjun Aurs</td>
                                            <td class=" ">395 - Yumi Street, London</td>
                                            <td class="hidden-phone ">0088770099</td>
                                            <td class="hidden-phone ">$44550</td>
                                            <td class="hidden-phone ">
                                                <a class="btn btn-success btn-small hidden-phone" data-original-title="" href="#">email</a>
                                                <a class="btn btn-small btn-primary hidden-tablet hidden-phone" data-original-title="" data-toggle="modal" role="button" href="#accSettings4"> edit </a>
                                                <div id="accSettings4" class="modal hide fade" aria-hidden="true" aria-labelledby="myModalLabel4" role="dialog" tabindex="-4">
                                                    <div class="modal-header">
                                                        <button class="close" aria-hidden="true" data-dismiss="modal" type="button"> × </button>
                                                        <h4 id="myModalLabel4"> Edit client details </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row-fluid">
                                                            <div class="span4">
                                                                <input class="span12" type="text" placeholder="Frist name">
                                                            </div>
                                                            <div class="span4">
                                                                <input class="span12" type="text" placeholder="Last name">
                                                            </div>
                                                            <div class="span4">
                                                                <input class="span12" type="text" placeholder="email">
                                                            </div>
                                                        </div>
                                                        <div class="row-fluid">
                                                            <div class="span4">
                                                                <input class="span12" type="text" placeholder="Contact">
                                                            </div>
                                                            <div class="span8">
                                                                <input class="span12" type="text" placeholder="Address">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn" aria-hidden="true" data-dismiss="modal"> Close </button>
                                                        <button class="btn btn-primary"> Save changes </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="gradeU even">
                                            <td class=" sorting_1">Barote babu</td>
                                            <td class=" ">Baripoda, 35-Africa</td>
                                            <td class="hidden-phone ">2059990099</td>
                                            <td class="hidden-phone ">$99876</td>
                                            <td class="hidden-phone ">
                                                <a class="btn btn-success btn-small hidden-phone" data-original-title="" href="#">email</a>
                                                <a class="btn btn-small btn-primary hidden-tablet hidden-phone" data-original-title="" data-toggle="modal" role="button" href="#accSettings3"> edit </a>
                                                <div id="accSettings3" class="modal hide fade" aria-hidden="true" aria-labelledby="myModalLabel3" role="dialog" tabindex="-3">
                                                    <div class="modal-header">
                                                        <button class="close" aria-hidden="true" data-dismiss="modal" type="button"> × </button>
                                                        <h4 id="myModalLabel3"> Edit client details </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row-fluid">
                                                            <div class="span4">
                                                                <input class="span12" type="text" placeholder="Frist name">
                                                            </div>
                                                            <div class="span4">
                                                                <input class="span12" type="text" placeholder="Last name">
                                                            </div>
                                                            <div class="span4">
                                                                <input class="span12" type="text" placeholder="email">
                                                            </div>
                                                        </div>
                                                        <div class="row-fluid">
                                                            <div class="span4">
                                                                <input class="span12" type="text" placeholder="Contact">
                                                            </div>
                                                            <div class="span8">
                                                                <input class="span12" type="text" placeholder="Address">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn" aria-hidden="true" data-dismiss="modal"> Close </button>
                                                        <button class="btn btn-primary"> Save changes </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div></div>
                            </div>
                            <div class='clearfix'></div>                                
                        </div>
                        
                    </div>
                    
                </div>               
            </div>
        </div>
    </div>
</div>
    