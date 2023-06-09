<?php view('partials/head.partial.php')  ?>

<?php view('partials/mobile-toggle.partial.php')  ?>

<?php view('partials/sidebar.partial.php')  ?>

<?php view('partials/header.partial.php') ?>

<?php view('partials/add-new.partial.php') ?>

    <?php if($models == null) { ?>
        <div class="row d-flex justify-content-center mt-5 pt-5 py-4">
            <div class="col-12 col-md-3">
                    <div class="card card-body border-0 shadow mb-4">
                        
                        <h2 class="h5 mb-4 text-center">No Models Added Yet</h2>
                        <a class="btn btn-primary" href="/model/create">Add A model</a>  
                    </div> 
                </div>
        </div>
<?php }else { ?>
    <div class="row d-flex justify-content-center py-4">
        
        <div class="col-12 col-md-10">
            
            <div class="card card-body border-0 shadow mb-4">
                    <div class="table-responsive">
                   
                        <table class="table table-centered table-nowrap mb-0 rounded">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-0 rounded-start">Brand</th>
                                    <th class="border-0">Model Name</th>
                                    <th class="border-0">Model Number</th>
                                    <th class="border-0">Date Added</th>
                                    <th class="border-0"></th>
                                    <th class="border-0"></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($models as $model) : ?>
                                <!-- Item -->
                                <tr>
                                    <td>
                                    <?php $brand = $db->query("select * from brands where id = :id", [':id' => $model['brand']])->find(); ?>
                                    <a href="/brand?id=<?=$brand['id']?>" class="text-white fw-bold"><span class="pill bg-primary rounded px-2 py-1"><?=$brand['name']?></span></a>
                                    </td>
                                    <td><?=$model['model_name']?></td>
                                    <td><?=$model['model_number']?></td>
                                    <td><?=substr($model['created_at'], 0, 19)?></td>

                                    <td>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-12 col-xl-2 px-0">
                                            <a href="/model/edit?id=<?=$model['id']?>" class="btn btn-sm btn-info d-inline-flex align-items-center" type="button" bs-toggle="tooltip" data-bs-placement="top" title="Edit model" data-bs-original-title="Edit model">
                                                Edit
                                            </a>
                                            </div>
                                            
                                        </div>
                                    </td>
                                    <td class="">
                                        <div class="d-flex align-items-center">
                                        <form action="/model" method="POST">
                                            <input class="d-inline-flex align-items-center" type="hidden" name="_method" value="DELETE">
                                            <input class="d-inline-flex align-items-center" type="hidden" name="id" value="<?=$model['id']?>">
                                            <button type="submit" class="btn btn-sm btn-danger d-inline-flex align-items-center" type="button" bs-toggle="tooltip" data-bs-placement="top" title="Delete model" data-bs-original-title="Delete model">
                                                Delete
                                            </button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                                <!-- End of Item -->
                                <?php endforeach; }?> 
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
               
                        
    <div class="theme-settings card bg-gray-800 pt-2 collapse" id="theme-settings">
        <div class="card-body bg-gray-800 text-white pt-4">
            <button type="button" class="btn-close theme-settings-close" aria-label="Close" data-bs-toggle="collapse"
            href="#theme-settings" role="button" aria-expanded="false" aria-controls="theme-settings"></button>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="m-0 mb-1 me-4 fs-7">Open source <span role="img" aria-label="gratitude">💛</span></p>
                <a class="github-button" href="https://github.com/themesberg/volt-bootstrap-5-dashboard"
                data-color-scheme="no-preference: dark; light: light; dark: light;" data-icon="octicon-star"
                data-size="large" data-show-count="true"
                aria-label="Star themesberg/volt-bootstrap-5-dashboard on GitHub">Star</a>
            </div>
            <a href="https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard" target="_blank"
            class="btn btn-secondary d-inline-flex align-items-center justify-content-center mb-3 w-100">
            Download
            <svg class="icon icon-xs ms-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z" clip-rule="evenodd"></path></svg>
            </a>
            <p class="fs-7 text-gray-300 text-center">Available in the following technologies:</p>
            <div class="d-flex justify-content-center">
                <a class="me-3" href="https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard"
                target="_blank">
                <img src="../../assets/img/technologies/bootstrap-5-logo.svg" class="image image-xs">
            </a>
            <a href="https://demo.themesberg.com/volt-react-dashboard/#/" target="_blank">
                <img src="../../assets/img/technologies/react-logo.svg" class="image image-xs">
            </a>
            </div>
    </div>
</div>

<div class="card theme-settings bg-gray-800 theme-settings-expand" id="theme-settings-expand">
    <div class="card-body bg-gray-800 text-white rounded-top p-3 py-2">
        <span class="fw-bold d-inline-flex align-items-center h6">
            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
            Settings
        </span>
    </div>
</div>


<?php view('partials/footer.partial.php')  ?>
<?php view('partials/scripts.partial.php')  ?>