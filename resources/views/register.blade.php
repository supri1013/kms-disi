<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/form_layouts.js"></script>
	<!-- /theme JS files -->

</head>
<form action="{{route('simpan.data')}}" method="POST">
    @csrf
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Basic legend</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <fieldset>
                <legend class="text-semibold">Enter your information</legend>

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" placeholder="Eugene Kopyov" name="name">
                </div>

                <div class="form-group">
                    <label>Role</label>
                    <input type="text" class="form-control" placeholder="Your strong password" name="role">
                </div>

                <div class="form-group">
                    <label>email</label>
                    <input type="email" class="form-control" placeholder="Repeat password" name="email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Repeat password" name="password">
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" class="form-control" placeholder="Repeat password" name="jabatan">
                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="number" class="form-control" placeholder="Repeat password" name="telepon">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" placeholder="Repeat password" name="alamat">
                </div>
            </fieldset>

            <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
            </div>
        </div>
    </div>
</form>
<!-- /basic legend -->