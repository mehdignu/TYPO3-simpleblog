<?php
namespace Pluswerk\Simpleblog\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Patrick Lobacher <patrick@lobacher.de>
 */
class PostTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Pluswerk\Simpleblog\Domain\Model\Post
     */
    protected $subject = null;

    protected function setUp()
    {
        $this->subject = new \Pluswerk\Simpleblog\Domain\Model\Post();
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
    public function getContentReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getContent()
        );

    }

    /**
     * @test
     */
    public function setContentForStringSetsContent()
    {
        $this->subject->setContent('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'content',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getPostdateReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPostdate()
        );

    }

    /**
     * @test
     */
    public function setPostdateForStringSetsPostdate()
    {
        $this->subject->setPostdate('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'postdate',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getCommentsReturnsInitialValueForComment()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getComments()
        );

    }

    /**
     * @test
     */
    public function setCommentsForObjectStorageContainingCommentSetsComments()
    {
        $comment = new \Pluswerk\Simpleblog\Domain\Model\Comment();
        $objectStorageHoldingExactlyOneComments = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneComments->attach($comment);
        $this->subject->setComments($objectStorageHoldingExactlyOneComments);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneComments,
            'comments',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addCommentToObjectStorageHoldingComments()
    {
        $comment = new \Pluswerk\Simpleblog\Domain\Model\Comment();
        $commentsObjectStorageMock = $this->getMock(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class, ['attach'], [], '', false);
        $commentsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($comment));
        $this->inject($this->subject, 'comments', $commentsObjectStorageMock);

        $this->subject->addComment($comment);
    }

    /**
     * @test
     */
    public function removeCommentFromObjectStorageHoldingComments()
    {
        $comment = new \Pluswerk\Simpleblog\Domain\Model\Comment();
        $commentsObjectStorageMock = $this->getMock(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class, ['detach'], [], '', false);
        $commentsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($comment));
        $this->inject($this->subject, 'comments', $commentsObjectStorageMock);

        $this->subject->removeComment($comment);

    }

    /**
     * @test
     */
    public function getAuthorReturnsInitialValueForAuthor()
    {
        self::assertEquals(
            null,
            $this->subject->getAuthor()
        );

    }

    /**
     * @test
     */
    public function setAuthorForAuthorSetsAuthor()
    {
        $authorFixture = new \Pluswerk\Simpleblog\Domain\Model\Author();
        $this->subject->setAuthor($authorFixture);

        self::assertAttributeEquals(
            $authorFixture,
            'author',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getTagReturnsInitialValueForTag()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getTag()
        );

    }

    /**
     * @test
     */
    public function setTagForObjectStorageContainingTagSetsTag()
    {
        $tag = new \Pluswerk\Simpleblog\Domain\Model\Tag();
        $objectStorageHoldingExactlyOneTag = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneTag->attach($tag);
        $this->subject->setTag($objectStorageHoldingExactlyOneTag);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneTag,
            'tag',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addTagToObjectStorageHoldingTag()
    {
        $tag = new \Pluswerk\Simpleblog\Domain\Model\Tag();
        $tagObjectStorageMock = $this->getMock(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class, ['attach'], [], '', false);
        $tagObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($tag));
        $this->inject($this->subject, 'tag', $tagObjectStorageMock);

        $this->subject->addTag($tag);
    }

    /**
     * @test
     */
    public function removeTagFromObjectStorageHoldingTag()
    {
        $tag = new \Pluswerk\Simpleblog\Domain\Model\Tag();
        $tagObjectStorageMock = $this->getMock(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class, ['detach'], [], '', false);
        $tagObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($tag));
        $this->inject($this->subject, 'tag', $tagObjectStorageMock);

        $this->subject->removeTag($tag);

    }
}
