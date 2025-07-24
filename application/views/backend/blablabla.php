<body>

    <?php $this->load->view('assets/css_dt'); ?>
    <?php $this->load->view('assets/css'); ?>





    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="card-header flex-column flex-md-row">
                    <div class="head-label text-center">
                        <h5 class="card-title mb-0">DataTable with Buttons</h5>
                    </div>
                    <div class="dt-action-buttons text-end pt-3 pt-md-0">
                        <div class="dt-buttons"> <button class="dt-button buttons-collection btn btn-label-primary dropdown-toggle me-2" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog" aria-expanded="false"><span><i class="ti ti-file-export me-sm-1"></i> <span class="d-none d-sm-inline-block">Export</span></span><span class="dt-down-arrow">▼</span></button> <button class="dt-button create-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button"><span><i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add New Record</span></span></button> </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select">
                                    <option value="7">7</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="75">75</option>
                                    <option value="100">100</option>
                                </select> entries</label></div>
                    </div>
                    <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                        <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control" placeholder="" aria-controls="DataTables_Table_0"></label></div>
                    </div>
                </div>
                <table class="datatables-basic table dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1395px;">
                    <thead>
                        <tr>
                            <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label=""></th>
                            <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 17px;" data-col="1" aria-label=""><input type="checkbox" class="form-check-input"></th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 324px;" aria-label="Name: activate to sort column ascending">Name</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 307px;" aria-label="Email: activate to sort column ascending">Email</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 110px;" aria-label="Date: activate to sort column ascending">Date</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 107px;" aria-label="Salary: activate to sort column ascending">Salary</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 129px;" aria-label="Status: activate to sort column ascending">Status</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 95px;" aria-label="Actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd">
                            <td class="  control" tabindex="0" style="display: none;"></td>
                            <td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td>
                            <td>
                                <div class="d-flex justify-content-start align-items-center user-name">
                                    <div class="avatar-wrapper">
                                        <div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-secondary">GG</span></div>
                                    </div>
                                    <div class="d-flex flex-column"><span class="emp_name text-truncate">Glyn Giacoppo</span><small class="emp_post text-truncate text-muted">Software Test Engineer</small></div>
                                </div>
                            </td>
                            <td>ggiacoppo2r@apache.org</td>
                            <td>04/15/2021</td>
                            <td>$24973.48</td>
                            <td><span class="badge  bg-label-success">Professional</span></td>
                            <td>
                                <div class="d-inline-block"><a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="text-primary ti ti-dots-vertical"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end m-0">
                                        <li><a href="javascript:;" class="dropdown-item">Details</a></li>
                                        <li><a href="javascript:;" class="dropdown-item">Archive</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></li>
                                    </ul>
                                </div><a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil"></i></a>
                            </td>
                        </tr>

                    </tbody>
                </table>

                <script>
                    $(document).ready(function() {
                        $('#DataTables_Table_0').DataTable();
                    });
                </script>

                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 50 of 100 entries</div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                <li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                <li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" class="page-link">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>