using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class show_light : MonoBehaviour {

    public Image light; 
	// Use this for initialization
	void Start () {
       
    }
	
	// Update is called once per frame
	void Update () {
		
	}
    public void show()
    {
        if (Savedata.lottoTimes > 0)
        {
            light.gameObject.SetActive(true);
        }
      
       
    }
}
