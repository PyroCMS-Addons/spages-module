<?php namespace Thrive\SpagesModule\Http\Controller\Admin;

use Thrive\SpagesModule\Page\Form\PageFormBuilder;
use Thrive\SpagesModule\Page\Table\PageTableBuilder;

use Anomaly\Streams\Platform\Http\Controller\AdminController;

class PagesController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param PageTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(PageTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param PageFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(PageFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param PageFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit( PageFormBuilder $form, $id )
    {
        return $form->render($id);
    }
}
