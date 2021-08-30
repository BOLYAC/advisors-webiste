<?php

namespace App\Imports;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProjectsImport implements ToModel, WithHeadingRow
{

    private $next_nor_no;

    public function __construct()
    {
        $this->next_nor_no = Project::max('row_no');
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Project([
            'title'             => $row['title'],
            'details'           => $row['details'] . $row['overview'],
            'seo_title'         => $row['title'],
            'seo_url_slug'      => Str::of($row['title'])->slug('-'),
            'seo_description'   => mb_substr(strip_tags(stripslashes($row['details'])), 0, 165, 'UTF-8'),
            'lowest_price'      => $row['price'],
            'category_id'       => $row['type'],
            'city'              => $row['city'],
            'project_size_min'  => $row['size'],
            'project_bedrooms'  => $row['bedrooms'],
            'project_bathrooms' => $row['bathrooms'],
            'created_by'        => Auth::id(),
            'visits'            => 0,
            'row_no'            => $this->next_nor_no++,
            'featured'          => 1
        ]);
    }
}
