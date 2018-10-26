<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Repositories\PageRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\Page;

class PageController extends Controller
{
    /** @var  PageRepository */
    private $pageRepository;

    public function __construct(PageRepository $pageRepo)
    {
        $this->pageRepository = $pageRepo;
    }


    /**
     * Show the form for editing the specified Page.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($code)
    {
        $page = Page::where('code',$code)->first();

        if (empty($page)) 
        {
            return redirect()->back();
        }
        return view('pages.edit')->with('page', $page);
    }

    /**
     * Update the specified Page in storage.
     *
     * @param  int              $id
     * @param UpdatePageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePageRequest $request)
    {

        $page = $this->pageRepository->findWithoutFail($id);

        if (empty($page)) 
        {
            $request->session()->flash('msg.error','Page not found');
            return redirect()->back();
        }

        $message = $page->name." page has been updated successfully";

        $page = $this->pageRepository->update($request->all(), $id);

        $request->session()->flash('msg.success',$message);

        return redirect()->back();;
    }

}
