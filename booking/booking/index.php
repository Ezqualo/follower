<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>SIRIKBANGET.COM</title>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-theme.min.css" />
<link rel="stylesheet" href="css/style.css" />
<?php
include('inc/koneksi.php');
include('inc/function.php');
?>
</head>
<body>
	<nav class="navbar navbar-inverse">
    	<div class="container">
        	<div class="navbar-header">
            	<button type="button" class="navbar-toggle collapse" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                	<span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://sirikbanget.com">SIRIKBANGET.COM</a>
            </div>
        </div>
    </nav>
  	<div class="container" role="main">
    	<div class="col-md-12">
        	<div class="row">
            	<div class="col-md-6">
                	<label class="col-sm-3 control-label no-padding-right">Tipe Kamar</label>
                    <div class="col-sm-6">
                		<select id="cmb-tipe" name="cmb-tipe" class="form-control select2_single" style="width:200px;">
                    		<?php combo_tipe('',$db);?>
                    	</select>
                    </div>
                </div>
                <div class="col-md-6">
                	Mulai tanggal: <span id="start"></span> <a href="#" id="picker" onClick="picker.show(); return false;">Pilih</a> 
      		Dalam: 
            		<select id="timerange">
     					<option value="week">1 Minggu</option>
     					<option value="2weeks">2 Minggu</option>
     					<option value="month" selected>1 Bulan</option>
     					<option value="2months">2 Bulan</option>
     				</select>
     				<label for="autocellwidth"><input type="checkbox" id="autocellwidth" checked="checked">Lebar kolom otomatis</label>
                </div><!-- end col 6-->
            </div><!--- end row-->
            <div class="row" style="margin-top:10px;">
           		<div class="col-md-12">
                	<div id="dp"></div>
                </div>
           		
           </div><!--- end row --->    	
        </div>
    </div>

</body>

<div id="md-reservasi" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
       
     		<div class="modal-header btn-primary">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Reservasi</h4>
      		</div>
            
            <div class="modal-body">
            
            	<form class="form-horizontal" id="frm-add-new" name="frm-add-new" style="padding-left:20px;">
                	<input type="hidden" class="form-control has-feedback-left" id="txt-tanggal-in" placeholder="" required>
            		<input type="hidden" class="form-control has-feedback-left" id="txt-tanggal-out" placeholder="" required>
                	<input type="hidden" class="form-control has-feedback-left" id="txt-id-kamar" placeholder="" readonly="readonly" required>
                    
                    <div class="form-group">
                    	<label class="control-label">Nama Tamu <span class="required">*</span></label>
        				<div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                       		<input type="text" class="form-control" id="txt-nama" value="" />
                       </div>
                    </div>
                    
                     
                    <div class="form-group">
                    	<label class="control-label">Harga Kamar <span class="required"></span></label>
        				<div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                           <input type="text" class="form-control" id="txt-harga" value="" readonly="readonly" style="text-align:right;" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                    	<label class="control-label">Lama inap <span class="required"></span></label>
        				<div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                           <input type="text" class="form-control" id="txt-lama" value="" readonly="readonly" style="text-align:right;" />
                        </div>
                    </div>
                         
                </form>
            </div>
            
            <div class="modal-footer">
            	<button type="button" id="btn-checkin" class="btn btn-success" title="Check IN" data-dismiss="modal" style="visibility:hidden;">Check IN</button>
                <button type="button" id="btn-checkout" class="btn btn-danger" title="Check OUT" data-dismiss="modal" style="visibility:hidden;">Check OUT</button>
            	<button type="button" id="btn-simpan" class="btn btn-primary" title="Simpan"  data-dismiss="modal">Simpan</button>
        		<button type="button" class="btn btn-default" data-dismiss="modal" title="Batal">Tutup</button>
            </div>
     		
     	</div>
    </div>
</div>

<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="js/daypilot/daypilot-all.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/booking.js"></script>
</html>