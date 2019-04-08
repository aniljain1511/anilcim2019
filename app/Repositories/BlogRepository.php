namespace App\Repositories;

use App\Blog;
use DB;

class BlogRepository
{
    /**
     * Get all of the category 
     *
     * @return Collection
     */

    public function getAllBlogs()
    {


		$blogData = Blog::where('deleted_status', 0)
                    ->orderBy('id', 'asc')
                    ->get();

			
			return $blogData;
		
    }

	public function insertData($data){
		$id = DB::table('blogs')->insertGetId($data);
		
		return $id;
	}

	public function getBlogById($id){

		return Blog::where('id', $id)->get()->first();
	}

	public function updateData($data,$id){
		DB::table('blogs')->where('id',$id)->update($data);
	}

	public function deleteBlog($data,$id){
		DB::table('blogs')->where('id',$id)->update($data);
	}

	

}
