<div class="row justify-content-center animated flipInX mb-4">
	<div class="col-md-6">
		<div class="form-group mb-5">
			<h3 class="text-center">Search any book cover in our DataBase</h3>
			<h3 class="text-center spinner" style="display: none;">
	            <i class="fa fa-spinner fa-spin fa-2x fa-fw text-info"></i>
	        </h3>
		</div>
		<div class="form-group">
			<form action="" method="post" id="searchForm" data-action="<?php echo HOME_AJAX;?>">
				<input type="search" name="search" class="form-control" placeholder="search..." autofocus="" autocomplete="off">
				<input type="hidden" id="csrf" name="csrf" value="<?php echo $viewmodel['csrf']; ?>">
				<input type="hidden" name="action" value="search">
			</form>
		</div>
	</div>
</div>
<div class="row justify-content-center animated flipInX innerText">
	
	


</div>
<script>
    $('.nav-item.home').addClass('active');
    $('#searchForm').submit(function(event){

        $.ajax({
            beforeSend: function(){
                $('.alert').alert('close');
                $('.spinner').show();
                 $('.innerText').html('');
            },
            method: 'POST',
            data: $('#searchForm').serialize(),
            url: $('#searchForm').data('action'),
            success: function(data){
                $('.spinner').hide();
                $('#csrf').val(data.csrf);
                if(typeof data.status !== "undefined" && data.status === 'success'){
                	let html = "";
                	data.data.forEach(function(ebook){

                		html += `
	                    <div class="animated flipInX card m-2" style="width: 18rem;">
						  <img class="card-img-top" src="<?php echo ROOT_PATH; ?>/assets/img/${ebook.img}" alt="${ebook.img}">
						  <div class="card-body">
						    <h5 class="card-title">${ebook.title}</h5>
						    <p class="card-text">${ebook.description}</p>
						  </div>
						</div>
	                    `
                	});
                    $('.innerText').html(html);

                	if(data.data.length === 0){
	                	$('.innerText').html(`
	                        <div class="animated flipInX col-md-6"><h3 class="text-center">No data to output</h3></div>
	                    `);
	                }
                }else{
                    $('.innerText').html(`
                        <div class="animated flipInX col-md-6"><h3 class="text-center">No data to output</h3></div>
                    `);
                }

            },
            error: function(){
                $('.innerText').prepend(`
                    <div class="animated flipInX col-md-6">
                    	<h3 class="text-center">Something went wrong!</h3>
                    </div>                 
                `); 
        		$('.spinner').hide();
            }
        });

        event.preventDefault();
    });
</script>