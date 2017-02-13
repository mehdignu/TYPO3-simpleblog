<?php
namespace Pluswerk\Simpleblog\Controller;


class BlogController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
	
	protected $blogRepository;
	
	  public function injectBlogRepository(\Pluswerk\Simpleblog\Domain\Repository\BlogRepository $blogRepository){
		  
        $this->blogRepository = $blogRepository;
    
    }
    
    public function addFormAction(\Pluswerk\Simpleblog\Domain\Model\Blog $blog = NULL){
		$this->view->assign('blog',$blog);
	}
	
	/**
	 * @param \Pluswerk\Simpleblog\Domain\Model\Blog $blog
	 * @validate $blog Pluswerk.Simpleblog:Autocomplete(property=title)
	 * 
	 */
	public function addAction(\Pluswerk\Simpleblog\Domain\Model\Blog $blog){
		
		$this->blogRepository->add($blog);
		$this->redirect('list');
		
	/*	for($i=1;$i<=3;$i++){
			
			$blog = $this->objectManager->get('Pluswerk\\Simpleblog\\Domain\\Model\\Blog');
			$blog->setTitle('This is the ' . $i*5 . '. Blog!');
			$this->blogRepository->add($blog); 
	}
	$this->redirect('list');*/
	}
	
	public function showAction(\Pluswerk\Simpleblog\Domain\Model\Blog $blog){
		$this->view->assign('blog',$blog);
	}
	
	public function updateFormAction(\Pluswerk\Simpleblog\Domain\Model\Blog $blog){
		$this->view->assign('blog',$blog);
	}
	public function updateAction(\Pluswerk\Simpleblog\Domain\Model\Blog $blog){
		$this->blogRepository->update($blog);
		$this->redirect('list');
	}
	public function deleteAction(\Pluswerk\Simpleblog\Domain\Model\Blog $blog){
		$this->blogRepository->remove($blog);
		$this->redirect('list');
	}
	
	public function deleteConfirmAction(\Pluswerk\Simpleblog\Domain\Model\Blog $blog){
		$this->view->assign('blog',$blog);
	}
	
	
    public function listAction()
    {
        if ($this->request->hasArgument('search')){
            $search = $this->request->getArgument('search');
        }
        $limit = ($this->settings['blog']['max']) ?: NULL;
        $this->view->assign('blogs', $this->blogRepository->findSearchForm($search,$limit));
        $this->view->assign('search', $search);
    }

}
