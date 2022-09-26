<!DOCTYPE html>
<html lang="en">

<head>
    {{include file="../include/head.tpl"}}
</head>

<body>

    <div class="wrapper">

        {{include file="../include/sidebar.tpl"}}

        <!-- page content -->

        <div id="content">

            {{include file="../include/topbar.tpl"}}

            <div class="row">

                <div class="col col-md-2"></div>

                <div class="col col-md-8">
                    <div class="card text-center">
                        <div class="card-header mb-3">
                            <h2>add a new dose</h2>
                            <hr>
                        </div>
                        <div class="card-body">
                            <div class="form-container row">
                                <div class="col col-md-2"></div>
                                <div class="col col-md-8">
                                    <p>I took</p>
                                </div>
                                <div class="col col-md-2"></div>
                                <form action="/add" method="POST">
                                    <div class="row g-3">
                                        <div class="form-group col-auto">
                                            <label for="substance">dose</label>
                                            <input type="text" class="form-control" id="dose" name="dose"
                                                placeholder="150">
                                        </div>
                                        <div class="form-group col-auto">
                                            <label for="substance">unit (of)</label>
                                            <input type="text" class="form-control" id="unit" name="unit"
                                                placeholder="ug">
                                        </div>
                                        <div class="form-group col-auto">
                                            <label for="substance">substance</label>
                                            <input type="text" class="form-control" id="substance" name="substance"
                                                placeholder="LSD">
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                        <div class="form-group col-auto">
                                                <label for="datetime">At</label>
                                                <input type="datetime-local" class="form-control" name="datetime" id="datetime">
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                        
                                    </div>
                                </form>




                            </div>
                        </div>
                    </div>
                </div>


                <div class="col col-md-2"></div>

            </div>


        </div>

    </div>


    <script type="text/javascript">
       // import { TempusDominus } from '@eonasdan/tempus-dominus';
        $(function () {
                $('#datetimepicker1').datetimepicker();
            });
      </script>
    
    {{include file="../include/js.tpl"}}
</body>

</html>