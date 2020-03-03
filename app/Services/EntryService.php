<?php


namespace App\Services;


use App\Repositories\EntryRepositoryInterface;

class EntryService
{
    /**
     * @var EntryRepositoryInterface
     */
    private $entryRepository;

    public function __construct(EntryRepositoryInterface $entryRepository)
    {
        $this->entryRepository = $entryRepository;
    }

    public function addEntry(array $attributes)
    {
        return $this->entryRepository->save($attributes);
    }

    public function getEntry(int $id)
    {
        return $this->entryRepository->find($id);
    }
}
