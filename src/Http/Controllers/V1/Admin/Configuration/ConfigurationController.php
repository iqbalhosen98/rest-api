<?php

namespace Mrpath\RestApi\Http\Controllers\V1\Admin\Configuration;

use Mrpath\Admin\Http\Requests\ConfigurationForm;
use Mrpath\Core\Repositories\CoreConfigRepository;
use Mrpath\Core\Tree;
use Mrpath\RestApi\Http\Controllers\V1\Admin\AdminController;

class ConfigurationController extends AdminController
{
    /**
     * Core config repository instance.
     *
     * @var \Mrpath\Core\Repositories\CoreConfigRepository
     */
    protected $coreConfigRepository;

    /**
     * Tree instance.
     *
     * @var \Mrpath\Core\Tree
     */
    protected $configTree;

    /**
     * Create a new controller instance.
     *
     * @param  \Mrpath\Core\Repositories\CoreConfigRepository  $coreConfigRepository
     * @return void
     */
    public function __construct(CoreConfigRepository $coreConfigRepository)
    {
        parent::__construct();
        
        $this->coreConfigRepository = $coreConfigRepository;

        $this->prepareConfigTree();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response([
            'data' => $this->configTree,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Mrpath\Admin\Http\Requests\ConfigurationForm  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConfigurationForm $request)
    {
        $this->coreConfigRepository->create($request->except(['_token', 'admin_locale']));

        return response([
            'message' => __('rest-api::app.common-response.success.update', ['name' => 'Configuration']),
        ]);
    }

    /**
     * Prepares config tree.
     *
     * @return void
     */
    private function prepareConfigTree()
    {
        $tree = Tree::create();

        foreach (config('core') as $item) {
            $tree->add($item);
        }

        $tree->items = core()->sortItems($tree->items);

        $this->configTree = $tree;
    }
}
