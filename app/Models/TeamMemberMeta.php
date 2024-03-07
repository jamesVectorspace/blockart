<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class TeamMemberMeta extends Model
{
    use HasFactory;
    protected $fillable = ['team_id', 'category', 'field', 'value'];

    /**
     * valid team member check
     *
     * @param int $teamMemberid
     * @param string $field
     * @return Illuminate\Database\Eloquent\Model
     */
    public static function getMemberMeta($teamMemberId, $field)
    {  
        return parent::where(['team_id' => $teamMemberId, 'field' => $field])->first();
    }

    /**
     * member package with it's user
     *
     * @param int $teamMemberid
     * @param string $field
     * @return Illuminate\Database\Eloquent\Model
     */
    public static function getMemberMetaUser($teamMemberId, $field)
    {  
        $memberameta = parent::getMemberMeta($teamMemberId, $field);
        if ($memberameta) {
            return User::find($memberameta->value);
        }
        return false;
    }

    /**
     * Team member access meta list
     *
     * @param int $teamMemberid
     * @param string $category
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function memberMetaData($teamMemberId, $category)
    {
        return parent::where(['team_id' => $teamMemberId, 'category' => $category])->get();
    }

    /**
     * Insert team member meta data
     *
     * @param array $data
     * @return boolean
     */
    public static function memberMetaInsert ($data = [])
    {
        return parent::insert($data);
    }

    /**
     * Insert team member default meta data
     *
     * @param array $data
     * @return boolean
     */
    public static function insertMetaData($id)
    {
        $data = [
            ['team_id' => $id, 'category' => 'usage', 'field' => 'word_used', 'value' => 0],
            ['team_id' => $id, 'category' => 'usage', 'field' => 'image_used', 'value' => 0],
            ['team_id' => $id, 'category' => 'usage', 'field' => 'minute_used', 'value' => 0],
            ['team_id' => $id, 'category' => 'usage', 'field' => 'character_used', 'value' => 0],
            ['team_id' => $id, 'category' => 'access', 'field' => 'template', 'value' => 1],
            ['team_id' => $id, 'category' => 'access', 'field' => 'image', 'value' => 1],
            ['team_id' => $id, 'category' => 'access', 'field' => 'code', 'value' => 1],
            ['team_id' => $id, 'category' => 'access', 'field' => 'speech_to_text', 'value' => 1],
            ['team_id' => $id, 'category' => 'access', 'field' => 'voiceover', 'value' => 1],
            ['team_id' => $id, 'category' => 'access', 'field' => 'long_article', 'value' => 1]
        ];
        parent::insert($data);
    }

    /**
     * update team member meta data
     *
     * @param int $id
     * @param string $field
     * @param int $oldWord
     * @param int $words
     * @return boolean
     */
    public static function updateTeamMemberMeta($id, $field,  $value)
    {
        return  parent::where([['team_id', $id], ['field', $field]])->update(['value' => $value]);
    }

    /**
     * Update team member meta validation
     *
     * @param array $data
     * @return mixed
     */
    protected static function updateTeamMetaValidation($data = [])
    {
        $validator = Validator::make($data, [
            'team_id' => 'required|numeric',
            'metaField'    => 'required|min:3|max:50',
            'metaValue'  => 'required|numeric',
        ]);

        return $validator;
    }
}
