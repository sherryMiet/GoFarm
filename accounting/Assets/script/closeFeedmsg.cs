using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;
public class closeFeedmsg : MonoBehaviour {
    public GameObject fullpanel;
    // Use this for initialization
    void Start () {
		
	}
	
	// Update is called once per frame
	void Update () {
		
	}
    public void close()
    {
        fullpanel.SetActive(false);
        SceneManager.LoadScene("Market_sell");
    }
    public void close_buy()
    {
        fullpanel.SetActive(false);
        SceneManager.LoadScene("Market_buy");
    }
    public void close_lotto()
    {
        fullpanel.SetActive(false);
        SceneManager.LoadScene("farm");
    }
    public void close_farm()
    {
        fullpanel.SetActive(false);
   
    }
}
