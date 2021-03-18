using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;


public class stock_up : MonoBehaviour {
    public stock_control count;
    public int chick=0;
    public int pig =0;
    public int ox =0;
    // Use this for initialization
    void Start () {
		
	}
	
	// Update is called once per frame
	void Update () {
		
	}
    public void add_count_chick()
    {
       if (count.max < 5-Savedata.smax)
        {
        chick++;
        count.chick_stock += chick;
        count.chick_total -= chick;
        chick = 0;
         }
    }
    public void add_count_pig()
    {
        if (count.max < 5 - Savedata.smax)
        {
        pig++;
        count.pig_stock += pig;
        count.pig_total -= pig;
        pig = 0;
        }
    }
    public void add_count_ox()
    {
        if (count.max < 5 - Savedata.smax)
        {
        ox++;
        count.ox_stock += ox;
        count.ox_total -= ox;
        ox = 0;
        
        }
    }
    public void cost_count_chick()
    {
        chick--;
        count.chick_stock += chick;
        if (count.chick_stock >= 0) {
         count.chick_total -= chick;
        }
        
        chick = 0;
    }
    public void cost_count_pig()
    {
        pig--;
        count.pig_stock += pig;
        if (count.pig_stock >= 0){
        count.pig_total -= pig;
        }
       
        pig = 0;
    }
    public void cost_count_ox()
    {
        ox--;
        count.ox_stock += ox;
        if (count.ox_stock >= 0 )
        {
        count.ox_total -= ox;
        }
       
        ox = 0;
    }
}
