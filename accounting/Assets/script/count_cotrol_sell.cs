using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class count_cotrol_sell : MonoBehaviour {

    public int chick = 0;
    public int pig = 0;
    public int ox = 0;
    public Text show_chick;
    public Text show_pig;
    public Text show_ox;
    // Use this for initialization
    void Start () {
		
	}
	
	// Update is called once per frame
	void Update () {

        if (chick < 0)
        {
            chick = 0;
        }
        if (pig < 0)
        {
            pig = 0;
        }
        if (ox < 0)
        {
            ox = 0;
        }
        Savedata.sell_chick = chick;
        Savedata.sell_pig = pig;
        Savedata.sell_ox = ox;
        show_chick.text = "" + chick;
        show_pig.text = "" + pig;
        show_ox.text = "" + ox;
    }
}
