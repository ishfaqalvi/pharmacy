<?php
namespace App\Repository;

use App\Models\ScholarshipDetail;
use Illuminate\Support\Facades\Cache;
use App\Models\Menu;
use App\Models\Slider;
use App\Models\Block;
use App\Models\Link;
use App\Models\NewsUpdate;
use App\Models\PublicSector;
use App\Models\Download;
use App\Models\InstituteDetail;
use App\Models\NewsEvent;
use App\Models\Member;
use App\Models\Contact;
use App\Models\Album;
use App\Models\Image;
use Settings;
use Carbon\Carbon;
class CacheRepository{

	public static function nenu()
	{
		return $menu = Cache::rememberForever('menu', function(){
			return Menu::all();
		});
	}

	public static function banner()
	{
		return $banner = Cache::rememberForever('banner', function(){
			$slides = array();
			$now = Carbon::now();
			$allSliders = Slider::where('from', '<=', $now)->where("slidertype", 'banner')->where('status','Publish')->where('state',1)->orderBy('order')->get();
			foreach($allSliders as $slide)
			{
				if (empty($slide->to)) {
					$slides[] = $slide;
				}else{
					if ($slide->to >= $now) {
						$slides[] = $slide; 
					}
				}			
			}
			return $slides;
		});
	}

	public static function notification()
	{
		return $notification = Cache::rememberForever('notification', function(){
			return Slider::where("slidertype", 'notification')->where('status','Publish')->where('state',1)->orderBy('order')->get();
		});
	}

	public static function spotlight()
	{
		return $spotlight = Cache::rememberForever('spotlight', function(){
			$slides = array();
			$now = Carbon::now();
			$allSliders = Slider::where('from', '<=', $now)->where("slidertype", 'spotlight')->where('status','Publish')->where('state',1)->orderBy('order')->get();
			foreach($allSliders as $slide)
			{
				if (empty($slide->to)) {
					$slides[] = $slide;
				}else{
					if ($slide->to >= $now) {
						$slides[] = $slide; 
					}
				}			
			}
			return $slides;
		});
	}

	public static function future_plan()
	{
		return $future_plan = Cache::rememberForever('future_plan', function(){
			return Block::where('category','future_plans')->where('status','Publish')->where('state',1)->orderBy('order')->get();
		});
	}

	public static function facilities()
	{
		return $facilities = Cache::rememberForever('facilities', function(){
			return Block::where('category','facilities')->where('status','Publish')->where('state',1)->orderBy('order')->get();
		});
	}

	public static function important()
	{
		return $important = Cache::rememberForever('important', function(){
			return Link::where("link_for", 'importants')->where('status','Publish')->where('state',1)->orderBy('order')->get();
		});
	}

	public static function institute()
	{
		return $institute = Cache::rememberForever('institute', function(){
			return Link::where("link_for", 'institute')->where('status','Publish')->where('state',1)->orderBy('order')->get();
		});
	}

	public static function news_update()
	{
		return $news_update = Cache::rememberForever('news_update', function(){
			return NewsUpdate::orderBy('order','asc')->where('status','Publish')->get();
		});
	}

	public static function all_news_update()
	{
		return $news_update = Cache::rememberForever('all_news_update', function(){
			$news_updates = array();
			$all_news = NewsUpdate::orderBy('order','asc')->get();
			foreach($all_news as $news)
            {
		        $date=date_create($news->date);
		        $news->date = date_format($date,"d/m/Y");
            	if ($news->link_type == 'File') {
            		$file = explode('.', $news->file);
                	$extension = end($file);
                	$news->extention = $extension;
                	$news_updates[] = $news;
            	}else{
            		$news->extention = 'LINK';
                	$news_updates[] = $news;
            	}
            }
            return $news_updates;
		});
	}

	public static function college_chart()
	{
		return $college_chart = Cache::rememberForever('college_chart', function(){
			return explode("|",Settings::get(['college_chart'])[0]);
		});
	}

	public static function staff_chart()
	{
		return $staff_chart = Cache::rememberForever('staff_chart', function(){
			return (Settings::get(['staff_chart'])[0]);
		});
	}

	public static function student_chart()
	{
		return $student_chart = Cache::rememberForever('student_chart', function(){
			return (Settings::get(['student_chart'])[0]);
		});
	}

	public static function publicSectors($type)
	{
		return PublicSector::where('type',$type)->where('status','Publish')->where('state',1)->orderBy('order','asc')->get();
	}

	public static function downloads($parent)
	{
		$downloads = array();
		$all_downloads =Download::where("parent_id" ,$parent)->where('state',1)->where('status','Publish')->get();
        foreach($all_downloads as $download)
        {
        	$date=date_create($download->date);
	        $download->date = date_format($date,"d/m/Y");
            $file = explode('.', $download->file);
            $extension = end($file);
            $download->extention = $extension;
            $downloads[] = $download;
        }
        return $downloads;
	}

	public static function instituteDetail($institute)
	{
		return InstituteDetail::where("institute_id" ,$institute)->where('status',1)->get();
	}

    public static function scholarshipDetail($scholarship)
    {
        return ScholarshipDetail::where("scholarship_id" ,$scholarship)->where('status',1)->get();
    }

	public static function newsEvents()
	{
		return $newsEvents = Cache::rememberForever('newsEvents', function(){
			return NewsEvent::where('status',1)->where('state','Publish')->orderBy('order','asc')->paginate(16);
		});
	}

	public static function albums()
	{
		return $albums = Cache::rememberForever('albums', function(){
			return Album::where('status',1)->paginate(9);
		});
	}

	public static function team_members($team)
	{
		return Member::where('team_id',$team)->where('status',1)->orderBy('order','asc')->get();
	}

	public static function directory_contacts($id)
	{
		return Contact::where('directory_id',$id)->where('status',1)->orderBy('order','asc')->get();
	}

	public static function album_images($album)
	{

		return Image::where('album_id',$album)->get();
	}
}