<?php
namespace Pluswerk\Simpleblog\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Patrick Lobacher <patrick@lobacher.de>
 */
class BlogTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Pluswerk\Simpleblog\Domain\Model\Blog
     */
    protected $subject = null;

    protected function setUp()
    {
        $this->subject = new \Pluswerk\Simpleblog\Domain\Model\Blog();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );

    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );

    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription()
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'description',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getImageReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getImage()
        );

    }

    /**
     * @test
     */
    public function setImageForStringSetsImage()
    {
        $this->subject->setImage('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'image',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getPostsReturnsInitialValueForPost()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getPosts()
        );

    }

    /**
     * @test
     */
    public function setPostsForObjectStorageContainingPostSetsPosts()
    {
        $post = new \Pluswerk\Simpleblog\Domain\Model\Post();
        $objectStorageHoldingExactlyOnePosts = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOnePosts->attach($post);
        $this->subject->setPosts($objectStorageHoldingExactlyOnePosts);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOnePosts,
            'posts',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addPostToObjectStorageHoldingPosts()
    {
        $post = new \Pluswerk\Simpleblog\Domain\Model\Post();
        $postsObjectStorageMock = $this->getMock(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class, ['attach'], [], '', false);
        $postsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($post));
        $this->inject($this->subject, 'posts', $postsObjectStorageMock);

        $this->subject->addPost($post);
    }

    /**
     * @test
     */
    public function removePostFromObjectStorageHoldingPosts()
    {
        $post = new \Pluswerk\Simpleblog\Domain\Model\Post();
        $postsObjectStorageMock = $this->getMock(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class, ['detach'], [], '', false);
        $postsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($post));
        $this->inject($this->subject, 'posts', $postsObjectStorageMock);

        $this->subject->removePost($post);

    }
}
