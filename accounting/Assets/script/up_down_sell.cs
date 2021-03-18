using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class up_down_sell : MonoBehaviour {

    public count_cotrol_sell count;
    // Use this for initialization
    void Start () {
		
	}
	
	// Update is called once per frame
	void Update () {
		
	}
    public void add_count_chick()
    {
        count.chick++;

    }
    public void add_count_pig()
    {
        count.pig++;

    }
    public void add_count_ox()
    {
        count.ox++;
    }
    public void cost_count_chick()
    {
        count.chick--;

    }
    public void cost_count_pig()
    {
        count.pig--;

    }
    public void cost_count_ox()
    {
        count.ox--;
    }
}
