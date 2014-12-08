<div class="row">
					<div class="col-md-12">
						<table class="table table-striped table-hover">
						<thead>
						<tr>
							<th>
								 #
							</th>
							<th>
								 Fee Category
							</th>
							<th class="hidden-480">
								 Amount
							</th>
							
							<th>
								 Total
							</th>
						</tr>
						</thead>
						<tbody>
						<?php if (!isset($results)): ?>
						       <p>There are currently no active data</p>
						    <?php
						  else:
						foreach ($results as $data) {
						?>
						<tr>
							<td>
								 1
							</td>
							<td>
								<?php echo $data->std_id; ?>
							</td>
							<td class="hidden-480">
								 Server hardware purchase
							</td>
							<td class="hidden-480">
								 32
							</td>
							<td class="hidden-480">
								
							</td>
							<td>
								 $2152
							</td>
						</tr>
						<?php } endif;  ?>
						</tbody>
						</table>
					</div>
				</div>

	

