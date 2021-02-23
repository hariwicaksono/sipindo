
<div class="modal fade" id="Detail<?php echo $staff->id_staff ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-xl">
<div class="modal-content">
<div class="modal-header py-2">
	<h6 class="modal-title" id="myModalLabel">Detail Team Member</h6>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">

<div class="row"> 
  <div class="col-md-3">
    <!-- Profile Image -->
    <div class="card">
      <div class="card-body box-profile">
        <div class="text-center">
          <img class="profile-user-img img-fluid img-circle" src="
		  <?php if(!$staff->gambar==NULL) { ?>
		  {{ asset('uploads/image/staff/thumbs/'.$staff->gambar) }}
		  <?php }else{ ?>
		  {{ asset('uploads/image/thumbs/'.website('icon')) }}
		  <?php } ?>" alt="{{ $staff->nama_staff }}">
        </div>

        <h3 class="profile-username text-center">{{ $staff->nama_staff }}</h3>

        <p class="text-muted text-center">{{ $staff->jabatan }}</p>

        <ul class="list-group list-group-unbordered mb-3">
          <li class="list-group-item">
		  <i class="fas fa-user-graduate"></i> <b>{{ $staff->pendidikan }}</b>
          </li>
          <li class="list-group-item">
		  <i class="far fa-star"></i> <b>{{ $staff->expertise }}</b>
          </li>
          <li class="list-group-item">
		  <i class="far fa-envelope"></i> <b>{{ $staff->email }}</b>
          </li>
        </ul>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <div class="col-md-9">
    	<div class="card">
    	<div class="card-header">
                <h3 class="card-title">Biodata: {{ $staff->nama_staff }}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
    	<table class="table table-bordered">
    		<thead>
    			<tr>
    				<th width="25%">Nama lengkap</th>
    				<th>{{ $staff->nama_staff }}</th>
    			</tr>
    		</thead>
    		<tbody>
    			<tr>
    				<td>Jabatan</td>
    				<td>{{ $staff->jabatan }}</td>
    			</tr>
    			<tr>
    				<td>Jenis/Kategori</td>
    				<td>{{ $staff->nama_kategori_staff }}</td>
    			</tr>
    			<tr>
    				<td>Pendidikan</td>
    				<td>{{ $staff->pendidikan }}</td>
    			</tr>
    			<tr>
    				<td>Expertise</td>
    				<td>{{ $staff->expertise }}</td>
    			</tr>
    			<tr>
    				<td>Email</td>
    				<td>{{ $staff->email }}</td>
    			</tr>
    			<tr>
    				<td>Telepon</td>
    				<td>{{ $staff->telepon }}</td>
    			</tr>
    			<tr>
    				<td>Tampil di website?</td>
    				<td>{{ $staff->status_staff }}</td>
    			</tr>
    			<tr>
    				<td>Keywords di Google</td>
    				<td>{{ $staff->keywords }}</td>
    			</tr>
    			<tr>
    				<td>Deskripsi lengkap</td>
    				<td>{{ $staff->isi }}</td>
    			</tr>
    		</tbody>
    	</table>
</div>
</div>
</div>
    </div>
</div>



</div>
</div>
</div>
</div>