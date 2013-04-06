<?php

//Yii::import('application.models.TrialBalance');

class TrialBalanceForm extends AccountLocal
{
	public $reporting_period_id = 1;
	
	public function search() {
		$criteria = new CDbCriteria;
		
		/*
		$criteria->compare('id', $this->id);
		$criteria->compare('account_local_id', $this->account_local_id);
		$criteria->compare('amount', $this->amount, true);
		$criteria->compare('reporting_period_id', $this->reporting_period_id);
		*/
		
		$criteria->with = array('trialBalances');
		//return AccountLocal::model()->with( array( 'trialBalances'=>array('on' => "reporting_period_id={$reporting_period_id}") ) );
				
		/*
		$criteria->addCondition("(SELECT cp.id FROM comanda_produs cp INNER JOIN comanda_analize_contractate ac ON cp.id = ac.id_comanda_produs
				INNER JOIN analiza a ON ac.id_analiza = a.id
				WHERE cp.id_comanda = t.id AND a.id_laborator = $id_laborator LIMIT 1) is not null");
		*/
		return new CActiveDataProvider($this, array(
				'criteria' => $criteria,
		));
	}
}