<?php

namespace App\Events;

use Illuminate\Session\Store;
use App\Models\ChapterViewLog;

class ViewChapterHandler
{
    private $session;

	public function __construct(Store $session)
	{
		$this->session = $session;
	}
	public function handle($chapter)
	{

		if (!$this->isChapterViewed($chapter)) {
			$chapter->increment('view');
			$this->storeChapter($chapter);
			ChapterViewLog::create(['chapter_id' => $chapter->id]);
		}
	}
	private function isChapterViewed($chapter)
	{
		$viewed = $this->session->get('viewed_chapters', []);

		return array_key_exists($chapter->id, $viewed);
	}

	private function storeChapter($chapter)
	{
		$key = 'viewed_chapters.' . $chapter->id;
		$this->session->put($key, time());
	}
}
