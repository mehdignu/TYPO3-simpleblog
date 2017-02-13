<?php
namespace Pluswerk\Simpleblog\Domain\Repository;

/***
 *
 * This file is part of the "Simple Blog extension" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Patrick Lobacher &lt;patrick@lobacher.de&gt;, +Pluswerk AG
 *
 ***/

/**
 * The repository for Blogs
 */
class BlogRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
	
	public function finsSearchWord($search){
		$q = $this->createQuery();
		$r = $q->execute();
		
		return $r;
	}
	
	 public function findSearchWord($search, $words = array('Tick', 'Trick', 'Track'))
    {
        $query = $this->createQuery();
        $query->matching(
            $query->logicalOr(
                $query->logicalAnd(
                    $query->like('title', '%'.$search.'%'),
                    $query->equals('description', '')
                ),
                $query->logicalAnd(
                    $query->equals('title', 'TYPO3'),
                    $query->like('description', '%ist toll%')
                ),
                $query->in('title', $words)
            )
        );
        return $query->execute();
    }
    /**
     * @param string $search
     * @param int $limit
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findSearchForm($search,$limit)
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setLanguageUid($GLOBALS["TSFE"]->tmpl->setup['config.']['sys_language_uid']);
        $query->matching(
            $query->like('title','%'.$search.'%')
        );
        $query->setOrderings(array('title' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));
        $limit = (int)$limit;
        if ($limit > 0) {
            $query->setLimit($limit);
        }
        return $query->execute();
    }
	
    }
