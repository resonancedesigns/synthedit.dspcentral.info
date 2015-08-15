<div id="content-swapper" class="container-fluid">
    <div class="row-fluid">
    	<div class="col-lg-12">
	        <h1>Search Results <small>for <?php echo $searchTerm; ?></small></h1>
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
					<?php if($searchResults['count'] === 0) {
						echo $searchResults['results'];
					} ?>
				</div>
			<?php else : ?>
				<div class="results-empty">
					<p><?php echo $searchEmpty; ?></p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>