<?php
namespace App\Repositories;

use Image;
use App\Project;

class ProjectsRepository{
    
    public function upFile($request){
        $request->user()->projects()->create([
            'name'=>$request->name,
            'thumbnail'=>$this->storageFile($request),
        ]);
    }

    public function storageFile($request){
        if ($request->hasFile('thumbnail')) {
            $thum = $request->thumbnail;
            $name = $thum->hashName();
            $thum->storeAs('public/thumbs/original',$name);
            $path = storage_path('app/public/thumbs/cropped/'.$name);
            Image::make($thum)->resize(100,100)->save($path);
            return $name;
        }else{
            return null;
        }
    }

    public function update($request,$id){
        $project = Project::findOrFail($id)->find($id);
        $project->name = $request->name;
        if($request->hasFile('thumbnail')){
            $project->thumbnail = $this->storageFile($request);
        }
        $project->save();
    }

    public function delete($id){
        return Project::findOrFail($id)->delete($id);        
    }
}