<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ImmigrationInstruction;

/**
 * common\models\ImmigrationInstruction 模型的表单搜索查询类.
 */
class ImmigrationInstructionSearch extends ImmigrationInstruction
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sort'], 'integer'],
            [['country_name', 'image', 'content', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * 根据查询参数创建数据提供者
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ImmigrationInstruction::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                //设置默认排序
                'defaultOrder' => ['sort' => SORT_DESC, 'updated_at'=>SORT_DESC],
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // 如果想要验证不通过时不显示数据, 请打开下一行注释.
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'sort' => $this->sort,
        ]);

        $query->andFilterWhere(['like', 'country_name', $this->country_name])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
