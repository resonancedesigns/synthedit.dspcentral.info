<div id="content-swapper" class="container-fluid">
    <div class="row-fluid">
    	<div class="col-lg-12">
	        <h1>Search Results</h1>
			<?php if($searchResults) : ?>
				<div class="results-count">
					<p><?php echo $searchResults['count']; ?> results found</p>
				</div>
				<div class="results-table">
					<?php foreach ($searchResults['results'] as $searchResult) : ?>
						<div class="result">
							<p><a href="#"><?php echo $searchResult->title; ?></a></p>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>