   <div class="header_top">
                <div class="container">
                    <div class="header_left float-right">
					
					<?php
						$sql=$this->db->query("SELECT * from kontak");
						$header=$sql->row_array();
					?>
					
                        <span><i class="lotus-icon-location"></i> <?php echo $header['alamat']?></span>
                        <span><i class="lotus-icon-phone"></i><?php echo $header['telp']?></span>
                    </div>
                    
                </div>
            </div>