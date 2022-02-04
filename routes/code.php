<?php





    Route::get('/code/make/index', App\Http\Livewire\Code\Make\Index::class)->name('code.make.index');
    Route::get('/code/make/create', App\Http\Livewire\Code\Make\Create::class)->name('code.make.create');
    Route::get('/code/make/edit/{id?}', App\Http\Livewire\Code\Make\Edit::class)->name('code.make.edit');
    Route::get('/code/make/show/{id?}', App\Http\Livewire\Code\Make\Show::class)->name('code.make.show');

    Route::get('/code/project/index', App\Http\Livewire\Code\Project\Index::class)->name('code.project.index');
    Route::get('/code/project/create', App\Http\Livewire\Code\Project\Create::class)->name('code.project.create');
    Route::get('/code/project/edit/{id?}', App\Http\Livewire\Code\Project\Edit::class)->name('code.project.edit');
    Route::get('/code/project/show/{id?}', App\Http\Livewire\Code\Project\Show::class)->name('code.project.show');




    // Route::get('/stor/post/index', App\Http\Livewire\Stor\Post\Index::class)->name('stor.post.index');
    // Route::get('/stor/post/create', App\Http\Livewire\Stor\Post\Create::class)->name('stor.post.create');
    // Route::get('/stor/post/edit/{id?}', App\Http\Livewire\Stor\Post\Edit::class)->name('stor.post.edit');
    // Route::get('/stor/post/show/{id?}', App\Http\Livewire\Stor\Post\Show::class)->name('stor.post.show');


    Route::get('/code/bank/index', App\Http\Livewire\Code\Bank\Index::class)->name('code.bank.index');
    Route::get('/code/bank/create', App\Http\Livewire\Code\Bank\Create::class)->name('code.bank.create');



Route::get('/code/form/create', App\Http\Livewire\Code\Form\Create::class)->name('code.form.create');

Route::get('/code/strapi/create', App\Http\Livewire\Code\Strapi\Create::class)->name('code.strapi.create');



/*test

Route::get('/test/category/index', App\Http\Livewire\Test\Category\Index::class)->name('test.category.index');
Route::get('/test/category/create', App\Http\Livewire\Test\Category\Create::class)->name('test.category.create');
Route::get('/test/category/edit/{id?}', App\Http\Livewire\Test\Category\Edit::class)->name('test.category.edit');
Route::get('/test/category/show/{id?}', App\Http\Livewire\Test\Category\Show::class)->name('test.category.show');
*/
